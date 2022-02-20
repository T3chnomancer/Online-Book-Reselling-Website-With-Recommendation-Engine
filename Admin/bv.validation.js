/*
 * jQuery Form Validation Plugin for BlueVoda
 * Copyright Pablo Software solutions 2011
 *
 */

(function($)
{
   $.fn.validate = function(options) 
   {
      return this.each(function() 
      {   
         $.validate(this, options);
      });
   };

   $.validate = function(obj, options) 
   {
      var settings = 
      {
         title_text: 'Please enter a value',
         error_text: 'The entered value is invalid',
         color_text: '#00FF00',
         color_hint: '#E1E1E1',
         color_error: '#E1E1E1',
         color_border: '#E1E1E1',
         effect: 'fade',
         match_text: 'Values must be identical',
         match_id: null,
         length_min: '',
         length_max: '',
         value_min: '',
         value_max: '',
         expr_min: '',
         expr_max: '',
         type: 'text',
         required: true,
         disallowfirstchoice: false,
         nohint: false,
         font_family: 'Arial',
         font_size: '13px',
         font_weight: 'normal',
         font_style: 'normal',
         position: 'topright',
         offsetx: 0,
         offsety: 0,
         bubble_class: 'bubble',
         param: null
      };

      if (options)
         settings = $.extend(settings, options);
 
      settings.title_text = $(obj).attr("title");
      if (settings.title_text == '')
      {
         settings.title_text = 'Enter a value';
      }

      var id = $(obj).attr("id");
      var bubbleid = "#" + id + "_bubble";

      var bubbleHtml = "<div id=\""+id+"_bubble\" class=\""+settings.bubble_class+"\">";
      bubbleHtml = bubbleHtml + "<div class=\"bubbleContent\">"+settings.title_text+"</div>";
      bubbleHtml = bubbleHtml + "</div>";
      bubbleHtml = bubbleHtml + "</div>";

      $("body").append(bubbleHtml);	

      $(obj).removeAttr("title");

      var nTop = $(obj).offset().top;
      var nLeft = $(obj).offset().left;

      if (settings.position == "topright")
      {
         nLeft += $(obj).width(); 
         if (settings.bubble_class == "bubble")
         {
            nLeft -= 27; 
         }
         nTop -= $(bubbleid).height(); 
         nTop -= 10;
      }
      
      if (settings.position == "topleft")
      { 
         nTop -= $(bubbleid).height(); 
         nTop -= 10; 
         if (settings.bubble_class == "bubble")
         {
            nLeft -= 27; 
         }
      }
		
      if (settings.position == "centerright")
      { 
         
		 nTop += settings.offsety+30;
      }

      nLeft += settings.offsetx;
      nTop += settings.offsety;

      $(bubbleid).css({	top: nTop, left: nLeft });
      setBubbleColor(bubbleid, settings.color_hint, settings.color_border);
      $(bubbleid).find(".bubbleContent").css("color", settings.color_text);
      $(bubbleid).find(".bubbleContent").css("font-family", settings.font_family);
      $(bubbleid).find(".bubbleContent").css("font-size", settings.font_size);
      $(bubbleid).find(".bubbleContent").css("font-weight", settings.font_weight);
      $(bubbleid).find(".bubbleContent").css("font-style", settings.font_style);
      $(bubbleid).hide();

      $.data(obj, 'settings', settings); 
	
      $(obj).focus(function()
      {
         doFocus(obj, settings);
      }).blur(function()
      {
         doBlur(obj, settings);
      });
   }

   $.validate.form = function($obj)
   {
      return validateform($obj);
   }

   function validateform($obj) 
   {
      var isOk = true;
      $('input', $obj).each(function()
      {
	settings = $.data(this, 'settings');
        if (settings) 
        {
            if (doValidate(this, settings) == false)
            {
               isOk = false;
            }
	}
      });
      $('textarea', $obj).each(function()
      {
	settings = $.data(this, 'settings');
        if (settings) 
        {
            if (doValidate(this, settings) == false)
            {
               isOk = false;
            }
	}
      });
      return isOk;
   }

   function doFocus(obj, settings) 
   {
      if (settings.nohint)
         return;

      var id = "#" + $(obj).attr("id")+"_bubble";

      if (settings.effect == 'slide')
      {
         $(id).show('slide', {direction: 'right' }, 500); 
      }
      else
      if (settings.effect == 'fade')
      {
         $(id).fadeIn(500); 
      }
      else
      {
         $(id).show(); 
      }
   }
			
   function doBlur(obj, settings) 
   {
      if (doValidate(obj, settings)) 
      {
         isOK(obj, settings);
      }
   }

   function setText(obj, text)
   {
      $(obj).find(".bubbleContent").html(text);
   }

   function setBubbleColor(obj, color, border)
   {
     $(obj).find(".bubbleContent").css("background-color", color);
     $(obj).find(".bubbleContent").css("border-color", border);

   }
			
   function reportError(obj, settings, text) 
   {
      var id = "#" + $(obj).attr("id")+"_bubble";
      setText(id, text);
      setBubbleColor(id, settings.color_error, settings.color_border);

      if (settings.effect == 'slide')
      {
         $(id).show('slide', {direction: 'right' }, 500); 
      }
      else
      if (settings.effect == 'fade')
      {
         $(id).fadeIn(500); 
      }
      else
      {
         $(id).show(); 
      }
   }
			
   function isOK(obj, settings) 
   {
      var id = "#" + $(obj).attr("id")+"_bubble";

      if (settings.effect == 'slide')
      {
         $(id).hide('slide', {direction: 'right' }, 500); 
      }
      else
      if (settings.effect == 'fade')
      {
         $(id).fadeOut(500, function() 
         {
            setText(id, settings.title_text);
            setBubbleColor(id, settings.color_hint, settings.color_border);
         }); 
      }
      else
      {
         $(id).hide();
         setText(id, settings.title_text);
         setBubbleColor(id, settings.color_hint, settings.color_border);
      }
   } 	


   function doValidate(obj, settings) 
   {
      var mask = null;
      
      switch(settings.type) 
      {
         case "text": 	
            break;
   
         case "alphanumeric": 
            mask = /\w*/;
            break;		

         case "number": 		
            mask = /^[0-9-+]+$/; 			
            break;

         case "email": 		
            mask = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i; 			
            break;

         case "custom":
            mask = settings.param;
            break;
      }

      pointer = $(obj);

      if (settings.required == true || pointer.val().length != 0) 
      {
         var isValid = true;

         if (mask)
         {
            isValid = mask.test(pointer.val());
         }

         if (isValid)
         {
            if (settings.length_min != '')
            {
               if (pointer.val().length < parseInt(settings.length_min))
               {
                  isValid = false;
               }
            }
            if (isValid && settings.length_max != '')
            {
               if (pointer.val().length > parseInt(settings.length_max))
               {
                  isValid = false;
               }
            }
         } 
       
         if (isValid)
         {         
            if (settings.type == 'number')
            {
               if (settings.value_min != '')
               {
                  isValid = eval(pointer.val() + settings.expr_min + settings.value_min);
               }
               if (isValid && settings.value_max != '')
               {
                  isValid = eval(pointer.val() + settings.expr_max + settings.value_max);
               }
            }

            if (settings.type == 'checkbox')
            {
               isValid = $(obj).is(':checked');
            }

            if (settings.type == 'radio')
            {
               var name = $(obj).attr('name');
               if ($("input[name='"+name+"']:checked").val())
               {
               }
               else
               {
                  isValid = false;
               }
            }

            if (settings.type == 'select')
            {
               var index = $(obj).attr("selectedIndex");
               if (index == -1)   
                  isValid = false;
               if (index == 0 && settings.disallowfirstchoice == true)
                  isValid = false;
            }

            if (settings.type == 'ajax')
            {
               isValid = false;

               var data = 'value=' + $(obj).val();
               $.ajax( { type:"POST", async: false, url: settings.param, data: data, success: function (result) 
               {
                  if (result == "true")
                  {
                     isValid = true;
                  }
               }
               });
            }

            if (settings.match_id) 
            {
               matchobj = $("#"+settings.match_id);
               matchsettings = matchobj.data('settings');	

               if (matchobj.val() != '' && matchobj.val() != pointer.val()) 
               {
                  reportError(obj, settings, settings.match_text);
                  reportError(matchobj, matchsettings, matchsettings.match_text);
               }
               else 
               {
                  if (matchobj.val() != '') 
                  { 
                     isOK(matchobj, matchsettings);
                  }
                  return true;
               }
            }
            else 
            {
               if (isValid == false)
               {
                  reportError(obj, settings, settings.error_text);
               }
               return isValid;
            } 
         }
         else 
         { 
            reportError(obj, settings, settings.error_text);
            return false; 
         }
      } 
      else 
      {	
         return true;
      }
   }
 
})(jQuery);