   var Inputdiameter;
   var InputSpacing;
   var InputText;
   var InputStartAngle;
   var InputColor;
   var InputStrokeWidth;
   var InputRadiusCircle;
   var base64String = "";
   var Circles = [];
   var RoundTexts = [];
   var LineTexts = [];
   var Pictures = [];
   var DeletedElements = [];
   var ElementsForLabels = [];
   var base64First = "";

   function rangeSlider() {
     var slider = $('.slidecontainer'),
       range = $('.slider'),
       value = $('.range-slider__value');
     slider.each(function () {

       value.each(function () {
         var max = $(this).next().attr("max");
         var min = $(this).next().attr("min");
         var input = $(this).next().val();
         var percentage = ((input - min) * 100) / (max - min);
         $(this).html(parseInt(percentage, 10) + "%");
         //console.log(percentage);
       });

       range.on('input', function () {
         // debugger;
         var max = $(this).attr("max");
         var min = $(this).attr("min");
         var input = this.value;

         var percentage = ((input - min) * 100) / (max - min)
         $(this).prev().html(parseInt(percentage, 10) + "%");
       });
     });
   }




   function updateLabels(element, show) {
     $(".card-body").removeClass("all");
     $("#labels").append("<li class='card elementlabel' id='" + element + "'><div class='card-body all' id='" + element + "'><p>" + show + "</p></div><center><button type='button' id='" + element + "' class='closeL' aria-label='Close'<span aria-hidden='true' class='text-danger'><span style='font-size:15px;margin-bottom:10px;position:relative;bottom:3px;font-weight:bold;'>Delete</span><i class='text-danger'>&times;</i></span></button></center></li>");
     $(".guide").css("display", "none");
     $("#howto").css("display", "block");
     //hideallproperties();
   }


   function hideallproperties() {
     $("#properties .property").attr("style", "display:none");
   }
   //last is for the element type
   $(document).ready(function () {
     updateTheCanvas();
     //Adding circle
     $("#addcircle").click(function () {
       hideallproperties();
       if (checkAvailiblity(Circles, 5) == 0) {
         return;
       }
       var moduleDiv = "<div id='Circle" + (Circles.length) + "' class='property'><h3>Circle: " + (Circles.length + 1) + "</h3><div class='slidecontainer' >Color:<input id='CircleColor-" + (Circles.length) + "'  /></div><div class='slidecontainer'>Radius:<span class='range-slider__value'>0</span><input type='range' id='InputRadiusCircle-" + (Circles.length) + "'  class='slider' min='30' max='240' value='260'></div><div class='slidecontainer'>Stroke width:<span class='range-slider__value'>0</span><input type='range' id='InputStrokeWidthCircle-" + (Circles.length) + "'  class='slider' min='1' max='100' value='1'></div></div>";


       $("#properties").append(moduleDiv);
       var Circle = [$('#InputRadiusCircle-' + (Circles.length)).val(), $('#InputStrokeWidthCircle-' + (Circles.length)).val(), null, null, null, null, null, null, "circle", null, "#16264c"];
       //console.log(Circle);
       Circles.push(Circle);

       updateLabels("Circle #" + (Circles.length - 1), "Circle #" + (Circles.length));

       updateTheCanvas();
       updateColorPicker("CircleColor-" + (Circles.length - 1));

     });
     //Adding Round text
     $("#addroundtext").click(function () {
       hideallproperties();
       if (checkAvailiblity(RoundTexts, 7) == 0) {
         return;
       }
       //var moduleDiv = "<div id='RoundText"+(RoundTexts.length)+"' class='property'><h3>Round Text: "+(RoundTexts.length)+"'</h3>Text:<div class='slidecontainer'>        <input type='text' id='InputTextRoundText-"+(RoundTexts.length)+"'  class='form-control' value='Text around the circle'>      </div>      Radius:      <div class='slidecontainer'>        <input type='range' id='InputRadiusRoundText-"+(RoundTexts.length)+"'  class='slider' min='30' max='240' value='260'></div>      Spacing:      <div class='slidecontainer'>        <input type='range' id='InputSpacingRoundText-"+(RoundTexts.length)+"'  class='slider' min='1' max='10' value='1'>      </div>      Start Point:      <div class='slidecontainer'>        <input type='range' id='InputStartingPointRoundText-"+(RoundTexts.length)+"'  class='slider' min='0' max='360' value='0'>      </div>      Font:      <div class='slidecontainer'>        <select id='InputFontRoundText-"+(RoundTexts.length)+"' class='form-control'>          <option value='Arial' style='font-family: Arial' selected=''>Arial</option>          <option value='Calibri' style='font-family: Calibri'>Calibri</option>          <option value='Courier New' style='font-family: Courier New'>Courier New</option>          <option value='Tahoma' style='font-family: Tahoma'>Tahoma</option>          <option value='Times New Roma' style='font-family: Times New Roma'>Times New Roma</option>          <option value='Verdana' style='font-family: Verdana'>Verdana</option>          <option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option>          <option value='Days' style='font-family: Days'>Days</option>          <option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option>          <option value='Marck Script' style='font-family: Marck Script'>Marck Script</option>        </select>      </div>      Font Size:      <div class='slidecontainer'>        <select id='InputFontSizeRoundText-"+(RoundTexts.length)+"' class='form-control'>          <option>6</option>          <option>7</option>          <option>8</option>          <option>9</option>          <option>10</option>          <option>12</option>          <option>14</option>          <option>16</option>          <option selected=''>18</option>          <option>20</option>          <option>22</option>          <option>24</option>          <option>28</option>          <option>30</option>          <option>32</option>          <option>34</option>          <option>36</option>          <option>38</option>          <option>40</option>          <option>42</option>          <option>44</option>          <option>46</option>          <option>48</option>          <option>50</option>          <option>52</option>          <option>54</option>          <option>56</option>          <option>60</option>          <option>64</option>          <option>72</option>          <option>80</option>      </select>    </div>    <div class='slidecontainer'>      <input id='InputBoldRoundText-"+(RoundTexts.length)+"' type='button' class='btn btn-secondary' value='bold'>    </div>    <div class='slidecontainer'>      <input id='InputItalicRoundText-"+(RoundTexts.length)+"' type='button' class='btn btn-secondary' value='Italic'>    </div>  </div>";
       var moduleDiv = "<div id='RoundText" + (RoundTexts.length) + "' class='property'><h3>Round Text: " + (RoundTexts.length + 1) + "</h3>                <div class='row'>                 <select id='InputFontRoundText-" + (RoundTexts.length) + "' class='form-control col-sm'>          <option value='Arial' style='font-family: Arial' selected='>Arial</option>          <option value='Calibri' style='font-family: Calibri'>Calibri</option>          <option value='Courier New' style='font-family: Courier New'>Courier New</option>          <option value='Tahoma' style='font-family: Tahoma'>Tahoma</option>          <option value='Times New Roma' style='font-family: Times New Roma'>Times New Roma</option>          <option value='Verdana' style='font-family: Verdana'>Verdana</option>          <option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option>          <option value='Days' style='font-family: Days'>Days</option>          <option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option>          <option value='Marck Script' style='font-family: Marck Script'>Marck Script</option>        </select>        <select id='InputFontSizeRoundText-" + (RoundTexts.length) + "' class='form-control col-sm'>          <option>6</option>          <option>7</option>          <option>8</option>          <option>9</option>          <option>10</option>          <option>12</option>          <option>14</option>          <option>16</option>          <option selected=''>18</option>          <option>20</option>          <option>22</option>          <option>24</option>          <option>28</option>          <option>30</option>          <option>32</option>          <option>34</option>          <option>36</option>          <option>38</option>          <option>40</option>          <option>42</option>          <option>44</option>          <option>46</option>          <option>48</option>          <option>50</option>          <option>52</option>          <option>54</option>          <option>56</option>          <option>60</option>          <option>64</option>          <option>72</option>          <option>80</option>      </select>          <button id='InputBoldRoundText-" + (RoundTexts.length) + "' type='button' class='btn'>            <img src='svg/bold-solid.svg' width='20' height='20'>          </button>          <button id='InputItalicRoundText-" + (RoundTexts.length) + "' type='button' class='btn'>              <img src='svg/italic-solid.svg' width='20' height='20'>          </button>         <div class='slidecontainer'>Color:<input id='RoundColor-" + (RoundTexts.length) + "'  /></div>         </div>      Text:      <div class='slidecontainer'>        <input type='text' id='InputTextRoundText-" + (RoundTexts.length) + "'  class='text' value='Text around the circle'>              </div>            <div class='slidecontainer'>        Radius:        <span class='range-slider__value'>0</span>        <input type='range' id='InputRadiusRoundText-" + (RoundTexts.length) + "'  class='slider' min='30' max='240' value='240'>      </div>           <div class='slidecontainer'>           Spacing:<span class='range-slider__value'>0</span>        <input type='range' id='InputSpacingRoundText-" + (RoundTexts.length) + "'  class='slider' min='1.00' max='10.00' value='1'>      </div>            <div class='slidecontainer'>        Start Point:<span class='range-slider__value'>0</span>        <input type='range' id='InputStartingPointRoundText-" + (RoundTexts.length) + "'  class='slider' min='0' max='360' value='0'>      </div>              </div>";
       $("#properties").append(moduleDiv);
       var RoundText = [$('#InputRadiusRoundText-' + (RoundTexts.length)).val(), $('#InputSpacingRoundText-' + (RoundTexts.length)).val(), $('#InputStartingPointRoundText-' + (RoundTexts.length)).val(), $('#InputTextRoundText-' + (RoundTexts.length)).val(), $('#InputFontRoundText-' + (RoundTexts.length)).val(), $('#InputFontSizeRoundText-' + (RoundTexts.length)).val(), "normal", "normal", "Round Text", null, "#16264c"];

       RoundTexts.push(RoundText);

       updateLabels("RoundText #" + (RoundTexts.length - 1), "RoundText #" + (RoundTexts.length));
       updateTheCanvas();
       updateColorPicker("RoundColor-" + (RoundTexts.length - 1));
     });
     //Adding Line Text
     $("#addlinetext").click(function () {
       hideallproperties();
       if (checkAvailiblity(LineTexts, 10) == 0) {
         return;
       }
       var moduleDiv = "<div id='LineText" + (LineTexts.length) + "' class='property'> <h3>Line Text: " + (LineTexts.length + 1) + "</h3> <div class='form-row'> <div class='col'> <select id='InputFontLineText-" + (LineTexts.length) + "' class='form-control'> <option value='Arial' style='font-family: Arial' selected=''>Arial</option> <option value='Calibri' style='font-family: Calibri'>Calibri</option> <option value='Courier New' style='font-family: Courier New'>Courier New</option> <option value='Tahoma' style='font-family: Tahoma'>Tahoma</option> <option value='Times New Roma' style='font-family: Times New Roma'>Times New Roma</option> <option value='Verdana' style='font-family: Verdana'>Verdana</option> <option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option> <option value='Days' style='font-family: Days'>Days</option> <option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option> <option value='Marck Script' style='font-family: Marck Script'>Marck Script</option> </select> </div> <div class='col'> <select id='InputFontSizeLineText-" + (LineTexts.length) + "' class='form-control'> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option> <option>12</option> <option>14</option> <option>16</option> <option selected=''>18</option> <option>20</option> <option>22</option> <option>24</option> <option>28</option> <option>30</option> <option>32</option> <option>34</option> <option>36</option> <option>38</option> <option>40</option> <option>42</option> <option>44</option> <option>46</option> <option>48</option> <option>50</option> <option>52</option> <option>54</option> <option>56</option> <option>60</option> <option>64</option> <option>72</option> <option>80</option> </select> </div> <div class='col'> <button id='InputBoldLineText-" + (LineTexts.length) + "' type='button' class='btn'> <img src='svg/bold-solid.svg' width='20' height='50'> </button> <button id='InputItalicLineText-" + (LineTexts.length) + "' type='button' class='btn'> <img src='svg/italic-solid.svg' width='50' height='50'> </button> </div> <div class='col'> <div class='slidecontainer' id='co'><input style='width:100%;height:100%' id='LineColor-" + (LineTexts.length) + "' /></div> </div> </div> Text: <div class='slidecontainer'> <input type='text' id='InputTextLineText-" + (LineTexts.length) + "' class='text' value='Text on the line'> </div> <div class='slidecontainer'> Horizontal Position: <span class='range-slider__value'>0</span> <input type='range' id='InputHorizontalPositionLineText-" + (LineTexts.length) + "' class='slider' min='0' max='250' value='125'> </div> <div class='slidecontainer'> Vertical Position:<span class='range-slider__value'>0</span> <input type='range' id='InputVerticalPositionLineText-" + (LineTexts.length) + "' class='slider' min='0' max='240' value='120'> </div> <div class='slidecontainer'> Rotation:<span class='range-slider__value'>0</span> <input type='range' id='InputRotationLineText-" + (LineTexts.length) + "' class='slider' min='0' max='360' value='0'> </div> </div> </div>";
       $("#properties").append(moduleDiv);
       var LineText = [$('#InputTextLineText-' + (LineTexts.length)).val(), $('#InputHorizontalPositionLineText-' + (LineTexts.length)).val(), $('#InputVerticalPositionLineText-' + (LineTexts.length)).val(), $('#InputRotationLineText-' + (LineTexts.length)).val(), $('#InputFontLineText-' + (LineTexts.length)).val(), $('#InputFontSizeLineText-' + (LineTexts.length)).val(), "normal", "normal", "Line Text", "#16264c"];
       LineTexts.push(LineText);

       updateLabels("LineText #" + (LineTexts.length - 1), "LineText #" + (LineTexts.length));
       updateTheCanvas();
       updateColorPicker("LineColor-" + (LineTexts.length - 1));
     });
     //Adding Pictures
     $("#addimage").click(function () {
       hideallproperties();
       //debugger;
       var undeleted = 0;
       for (var i = 0; i < Pictures.length; ++i) {
         //Runs when it is deleted
         if (typeof Pictures[i][6] === 'undefined') {
           undeleted++;
         }
       }
       var ne = 1 - undeleted;
       if (ne == 0 || ne < 0) {
         return;
       }
       var moduleDiv = "<div id='Picture" + (Pictures.length) + "' class='property'> <h3>Image: " + (Pictures.length + 1) + "</h3>Image:      <div class='slidecontainer'>        <input type='file' id='InputPictureSrc-" + (Pictures.length) + "' name='files' /></div>            <div class='slidecontainer'>      Horizontal Position:  <span class='range-slider__value'>0</span> <input type='range' id='InputPictureHorizontalPosition-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='126' >      </div>           <div class='slidecontainer'>     Vertical Position:  <span class='range-slider__value'>0</span>    <input type='range' id='InputPictureVerticalPosition-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='126' >      </div>          <div class='slidecontainer'>   Size:  <span class='range-slider__value'>0</span>     <input type='range' id='InputPictureSize-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='250' >      </div>           <div class='slidecontainer'>      Rotation:   <span class='range-slider__value'>0</span>  <input type='range' id='InputPictureRotation-" + (Pictures.length) + "'  class='slider' min='0' max='360' value='0' >      </div>  </div>";

       $("#properties").append(moduleDiv);
       var Picture = [($('#InputPictureSrc-' + (Pictures.length)).val() == null ? null : $('#InputPictureSrc-' + (Pictures.length)).val()), $('#InputPictureSize-' + (Pictures.length)).val(), $('#InputPictureHorizontalPosition-' + (Pictures.length)).val(), $('#InputPictureVerticalPosition-' + (Pictures.length)).val(), $('#InputPictureRotation-' + (Pictures.length)).val(), "Picture"];

       Pictures.push(Picture);

       updateLabels("Picture #" + (Pictures.length - 1), "Image #" + (Pictures.length));
       updateTheCanvas();
     });

     function updateColorPicker(ele) {
       $("#" + ele).spectrum({
         color: "#16264c",
         move: function (color) {

           if (ele.indexOf("Circle") !== -1) {
             var indexofelement = ele.split("-").pop();
             Circles[indexofelement][10] = color.toHexString();
             updateTheCanvas();
           } else if (ele.indexOf("Round") !== -1) {
             var indexofelement = ele.split("-").pop();
             RoundTexts[indexofelement][10] = color.toHexString();
             updateTheCanvas();
           } else if (ele.indexOf("Line") !== -1) {
             var indexofelement = ele.split("-").pop();
             LineTexts[indexofelement][11] = color.toHexString();
             updateTheCanvas();
           }

         }
       });
     }

     function updateTheCanvas() {
       rangeSlider();
       var fore = $('.pickup').val();
       $('.canvas').append(getCircularText(fore, Circles, RoundTexts, LineTexts, Pictures, DeletedElements));

     }
     $(document).on('click', '.closeL', function () {

     }
     $(document).on('click', '.closeL', function () {

       var orignalid = $(this).attr('id');
       $(this).parent().parent().css("display", "none");
       $(this).parent().parent().attr("id", "deleted");
       var typeofelement = orignalid.split(' ')[0];
       var indexofelement = orignalid.split('#')[1];
       var deleteElement = [typeofelement, indexofelement];

       if (typeofelement == "Circle") {

         Circles[indexofelement].push("deleted");

       } else if (typeofelement == "LineText") {

         LineTexts[indexofelement].push("deleted");
       } else if (typeofelement == "RoundText") {

         RoundTexts[indexofelement].push("deleted");
       } else {

         Pictures[indexofelement].push("deleted");
         base64First = "";
       }




       updateTheCanvas();
       hideallproperties();
       var set = $(".card:not(#deleted)");
       var index = 0;

       if ($(this).parent().parent().children().hasClass("all")) {
         $(".card:not(#deleted)").each(function () {

           var isLastElement = index == set.length - 1;

           if (isLastElement) {
             $(this).children().trigger("click");
           }
           index++;
         });

       } else {
         index = 1;
         //$(this).parent().parent().children().trigger("click");
         $(".all").trigger("click");
       }

       if (index == 0) {
         $(".guide").css("display", "block");

         $("#howto").css("display", "none");
       }

       //console.log(DeletedElements);
     });
     $(document).on('click', '.card-body', function () {
       // debugger;
       $(".card-body").removeClass("all");
       hideallproperties();
       var valueoflabel = $(this).attr("id");
       $(this).addClass('all');
       var elementtype = valueoflabel.split("#")[0];
       var elementindex = valueoflabel.split("#")[1];
       var propertywindowid = elementtype.trim() + elementindex;
       $("#" + propertywindowid).attr("style", "display:block");

     });
     $('.pickup').change(function () {
       updateTheCanvas();
     })
     $(document).on('change input click', 'input[type=text],input[type=range],input[type=file], select, button:not(.close,.swal-button,.modals)', function () {

       var idofelement = $(this).attr("id");
       var valueofelement = $(this).val();
       var indexofelement = idofelement.split("-").pop();
       //Checking if the element is circle
       if (idofelement.indexOf("Circle") !== -1) {
         if (idofelement.split('-')[0] == "InputRadiusCircle") {
           Circles[indexofelement][0] = valueofelement;
           // console.log(Circles);
           updateTheCanvas();
         } else if (idofelement.split('-')[0] == "InputStrokeWidthCircle") {
           Circles[indexofelement][1] = valueofelement;
           updateTheCanvas();
         }
       } else if (idofelement.indexOf("RoundText") !== -1) {
         var theElementInputId = idofelement.split('-')[0];
         if (theElementInputId == "InputTextRoundText") {
           RoundTexts[indexofelement][3] = valueofelement;
         } else if (theElementInputId == "InputRadiusRoundText") {
           RoundTexts[indexofelement][0] = valueofelement;
         } else if (theElementInputId == "InputSpacingRoundText") {
           RoundTexts[indexofelement][1] = valueofelement;
         } else if (theElementInputId == "InputFontRoundText") {
           RoundTexts[indexofelement][4] = valueofelement;
         } else if (theElementInputId == "InputFontSizeRoundText") {
           RoundTexts[indexofelement][5] = valueofelement;
         } else if (theElementInputId == "InputStartingPointRoundText") {
           RoundTexts[indexofelement][2] = valueofelement;
         } else if (theElementInputId == "InputBoldRoundText") {
           if (RoundTexts[indexofelement][6] == "normal") {
             RoundTexts[indexofelement][6] = "600";
           } else {
             RoundTexts[indexofelement][6] = "normal";
           }
         } else if (theElementInputId == "InputItalicRoundText") {
           if (RoundTexts[indexofelement][7] == "normal") {
             RoundTexts[indexofelement][7] = "italic";
           } else {
             RoundTexts[indexofelement][7] = "normal";
           }
         }
         updateTheCanvas();



       } else if (idofelement.indexOf("LineText") !== -1) {
         var theElementInputId = idofelement.split('-')[0];
         if (theElementInputId == "InputHorizontalPositionLineText") {
           LineTexts[indexofelement][1] = valueofelement;
         } else if (theElementInputId == "InputVerticalPositionLineText") {
           LineTexts[indexofelement][2] = valueofelement;
         } else if (theElementInputId == "InputTextLineText") {
           LineTexts[indexofelement][0] = valueofelement;
         } else if (theElementInputId == "InputRotationLineText") {
           LineTexts[indexofelement][3] = valueofelement;
         } else if (theElementInputId == "InputFontLineText") {
           LineTexts[indexofelement][4] = valueofelement;
         } else if (theElementInputId == "InputFontSizeLineText") {
           LineTexts[indexofelement][5] = valueofelement;
         } else if (theElementInputId == "InputBoldLineText") {
           if (LineTexts[indexofelement][6] == "normal") {
             LineTexts[indexofelement][6] = "600";
           } else {
             LineTexts[indexofelement][6] = "normal";
           }
         } else if (theElementInputId == "InputItalicLineText") {
           if (LineTexts[indexofelement][7] == "normal") {
             LineTexts[indexofelement][7] = "italic";
           } else {
             LineTexts[indexofelement][7] = "normal";
           }
         }

         updateTheCanvas();
       } else if (idofelement.indexOf("Picture") !== -1) {

         var theElementInputId = idofelement.split('-')[0];
         if (theElementInputId == "InputPictureHorizontalPosition") {
           Pictures[indexofelement][2] = valueofelement;
         } else if (theElementInputId == "InputPictureVerticalPosition") {
           Pictures[indexofelement][3] = valueofelement;
         } else if (theElementInputId == "InputPictureSize") {
           Pictures[indexofelement][1] = valueofelement;
         } else if (theElementInputId == "InputPictureRotation") {
           Pictures[indexofelement][4] = valueofelement;
         } else if (theElementInputId == "InputPictureSrc") {
           //debugger;
           // var file = document.getElementById(idofelement).files[0];
           // var reader = new FileReader();
           // reader.onloadend = function() {
           //   Pictures[indexofelement][0] =  reader.result;
           //   updateTheCanvas();
           //   console.log(Pictures[indexofelement][0]);
           // }

         }
         updateTheCanvas();
       }
       //console.log(idofelement);
     });
   })



















   $('input[type=range]').on('input', function () {
     $(this).trigger('change');
   });


   $(document).on('change', 'input[type=file]', function () {
     if (this.files && this.files[0]) {

       var FR = new FileReader();
       var id = $(this).attr("id");
       var index = id.split('-').pop();

       FR.addEventListener("load", function (e) {
         base64First = e.target.result;
         for (var i = 0; i < Pictures.length; i++) {
           Pictures[i][0] = base64First;
           Pictures[i][2] = 125;
           Pictures[i][3] = 125;
           $("#InputPictureVerticalPosition-" + index).val(126);
           $("#InputPictureHorizontalPosition-" + index).val(126);
           var img = new Image();
           img.onload = function () {
             $("#InputPictureSize-" + index).attr("max", img.height);
             $("#InputPictureSize-" + index).attr("value", img.height);
             Pictures[0][1] = img.height;
           }
           img.src = 'data:image/png;base64' + base64First;
         }
         rangeSlider();
         var fore = $('.pickup').val();
         $('.canvas').append(getCircularText(fore, Circles, RoundTexts, LineTexts, Pictures, DeletedElements));
       });

       FR.readAsDataURL(this.files[0]);
     }
   });


   function checkAvailiblity(ElementArray, max) {
     var undeleted = 0;
     for (var i = 0; i < ElementArray.length; ++i) {
       //Runs when it is deleted
       if (typeof ElementArray[i][9] === 'undefined') {
         undeleted++;
       }
     }
     var ne = max - undeleted;
     if (ne == 0 || ne < 0) {
       return 0;
     }
     return 1;
   }

   function down(session) {
     if (session == "null" || session == null) {
       $("#myModalLogin").modal('toggle');
       $("#info").html("Please Login Before Downloading Your Stamp");
       return;
     }
     incrementdownloadnumber(session);

     download();
     //   var link = document.createElement('a');
     // link.download = 'amazinglogo.png';
     // link.href = document.getElementById('can').toDataURL();
     // link.click();
   }

   function incrementdownloadnumber(s) {
     $.ajax({
       url: "incrementdownloadnum.php", //the page containing php script
       type: "post", //request type,
       dataType: 'json',
       data: {
         id: s
       },
       success: function (response) {
         console.log(response.abc);
       }
     });
   }
   //Signup Modals
   $(document).ready(function () {
     var customLang = false;
     var notTranslator = false;
     var customLang2 = false;
     $(".suggest").hide();

     $("#lang2").slideToggle();
     $("#lang3").slideToggle();
     $("#reason").slideToggle();
     $("#source").click(function () {
       //Opening the custom lang
       $("#langS").slideToggle();
       $("#lang2").slideToggle();
       customLang = !customLang;
       CheckValidation(customLang, "#lang2");
       CheckValidation(!customLang, "#langS");
     });
     $("#target").click(function () {
       //Opening the custom lang
       $("#langTarget").slideToggle();
       $("#lang3").slideToggle();
       customLang2 = !customLang2;
       CheckValidation(customLang2, "#lang3");
       CheckValidation(!customLang2, "#langTarget");
     });

     $("#notatranslator").click(function () {
       notTranslator = !notTranslator;
       $("#reason").slideToggle();
       $("#langS").slideToggle();
       $("#langTarget").slideToggle();
       $("emp").slideToggle();
       CheckValidation(notTranslator, "#reason");
       CheckValidation(!notTranslator, "#langS");
       CheckValidation(!notTranslator, "#langTarget");
     });
     $("#signUp").click(function () {});

   });

   function CheckValidation(customLang, id) {
     if (customLang == true) {
       $(id + "").attr("required", "true");
     } else {
       $(id + "").removeAttr("required");
     }
   }