var Inputdiameter;
var InputSpacing;
var InputText;
var InputStartAngle;
var InputColor;
var InputStrokeWidth;
var InputRadiusCircle;
var base64String = "";

var openBack = true;
var Circles = [];
var Triangles = [];
var RoundTexts = [];
var LineTexts = [];
var Pictures = [];
var Squares = [];
var Lines = [];
var Backgrounds = [];
var stageBackgrounds = [null, null, null, null, null, null, 1, 1, null, null];

var deletedElements = [];

var ElementsForLabels = [];
var base64First = "";
var widthStage = 472;
var heightStage = 665;
function updateTheCanvas() {
  rangeSlider();
  var fore = $('.pickup').val();
  heightStage = parseInt(stage.height() * stage.scaleY());
  widthStage = parseInt(stage.width() * stage.scaleX());
  getCircularText(fore, Circles, Triangles, LineTexts, Pictures, Squares, Lines, deletedElements, stageBackgrounds, RoundTexts, Backgrounds);

}
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
      if ($(this).attr("id") !== 'Stage') {
        return;
      }
      // debugger;
      var max = $(this).attr("max");
      var min = $(this).attr("min");
      var input = this.value;

      var percentage = ((input - min) * 100) / (max - min)
      $(this).prev().html(parseInt(percentage, 10) + "%");
    });
  });
}


function showLabels() {
  $("#labels-container").attr("style", "display:block");
}
function updateLabels(element, show) {
  let showVal = show.split(" ");
  let showText = showVal[0]
  let showNumber = showVal[1]
  console.log("show", showText, "showNumber", showNumber)
  $(".card-body").removeClass("all");
  // $("#labels").prepend("<li class='card elementlabel' id='" + element + "'><div class='card-body all' id='" + element + "'><p>" + show + "</p></div><center><button type='button' id='" + element + "' class='closeL' aria-label='Close'<span aria-hidden='true' class='text-danger'><span style='font-size:15px;margin-bottom:10px;position:relative;bottom:3px;font-weight:bold;'></span><i class='text-danger'>&times;</i></span></button><i class='far fa-caret-square-down' onclick='down(this)'></i>&nbsp;<i class='far fa-caret-square-up' onclick='up(this)'></i></center></li>");
  $("#labels").prepend("<div class='elementlabel mt-2' id='" + element + "'><div class=' all' id='" + element + "'><p style='border-bottom: 1px solid blue; color: blue; font-weight: 600;margin-bottom: 2px;'>" + showText + " <br /> " + showNumber + " </p></div><div> <button type='button' class='closeL btn' aria-label='Close'style='background: transparent; border: none; padding: 0px; color: blue; font-weight: 600;'>Delete<span aria-hidden='true' class='text-danger' style='position: relative;left: -5px;top: 5px;'><span style='font-size:15px;position:relative;bottom:3px;font-weight:bold;'></span><i class='text-danger'>&times;</i></span></button><i class='far fa-caret-square-down' onclick='down(this)'></i>&nbsp;<i class='far fa-caret-square-up' onclick='up(this)'></i></div></div>");
  $(".guide").css("display", "none");
  $("#howto").css("display", "block");
  //hideallproperties();
}


function showInstructions() {
  var element = document.getElementById("instructions");

  if (element.classList) {
    element.classList.toggle("hide");
  } else {
    // For IE9
    var classes = element.className.split(" ");
    var i = classes.indexOf("hide");

    if (i >= 0)
      classes.splice(i, 1);
    else
      classes.push("hide");
    element.className = classes.join(" ");
  }
}
function hideLabels() {
  $("#labels-container").attr("style", "display:none");
}
function hideallproperties() {
  $("#properties .property").attr("style", "display:none");
}
//last is for the element type
$(document).ready(function () {
  updateTheCanvas();
  //Adding circle
  $("#addcircle").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    if (checkAvailiblity(Circles, 5) == 0) {
      return;
    }
    var moduleDiv = " <div id='Circle" + (Circles.length) + "' class='property'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;''>Properties</h5> <h3>Circle: " + (Circles.length + 1) + "</h3><div class='slidecontainer color-element'><p>Fill Color:</p><input id='CircleColorFill-" + (Circles.length) + "' /></div><div class='slidecontainer color-element'><p>Stroke Color:</p><input id='CircleColorStroke-" + (Circles.length) + "' /></div><div class='slidecontainer'>Stroke width:<span class='range-slider__value'>0</span><input type='range' id='InputStrokeWidthCircle-" + (Circles.length) + "' class='slider' min='1' max='20' value='5'></div><div class='slidecontainer'>Radius:<span class='range-slider__value'>0</span><input type='range' id='InputRadiusCircle-" + (Circles.length) + "' class='slider' min='1' max='120' value='20'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputCircleCheckbox-" + (Circles.length) + "'><label class='custom-control-label' for='InputCircleCheckbox-" + (Circles.length) + "'>Fill?</label></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns <b>Click Here</b></div></div></div></div>";


    $("#properties").append(moduleDiv);
    var Circle = [$('#InputRadiusCircle-' + (Circles.length)).val(), $('#InputStrokeWidthCircle-' + (Circles.length)).val(), null, null, null, null, null, null, "circle", null, "#16264c", "#16264c", $('#InputCircleCheckbox-' + (Circles.length)).is(":checked")];
    //console.log(Circle);
    Circles.push(Circle);

    updateLabels("Circle #" + (Circles.length - 1), "Circle #" + (Circles.length));

    updateTheCanvas();
    updateColorPicker("CircleColorFill-" + (Circles.length - 1));
    updateColorPicker("CircleColorStroke-" + (Circles.length - 1));
    updateFillProperty("InputCircleCheckbox-" + (Circles.length - 1));

  });
  $("#addtriangle").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    if (checkAvailiblity(Triangles, 5) == 0) {
      return;
    }
    var moduleDiv = "<div id='Triangle" + (Triangles.length) + "' class='property'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;'>Properties</h5> <h3>Triangle: " + (Triangles.length + 1) + "</h3><div class='slidecontainer color-element'><p>Fill Color:</p><input id='TriangleColorFill-" + (Triangles.length) + "' /></div><div class='slidecontainer color-element'><p>Stroke Color:</p><input id='TriangleColorStroke-" + (Triangles.length) + "' /></div><div class='slidecontainer'>Stroke width:<span class='range-slider__value'>0</span><input type='range' id='InputStrokeWidthTriangle-" + (Triangles.length) + "' class='slider' min='1' max='20' value='1'></div><div class='slidecontainer'>Size:<span class='range-slider__value'>0</span><input type='range' id='InputRadiusTriangle-" + (Triangles.length) + "' class='slider' min='1' max='80' value='20'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputTriangleCheckbox-" + (Triangles.length) + "'><label class='custom-control-label' for='InputTriangleCheckbox-" + (Triangles.length) + "'>Fill?</label></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns <b>Click Here</b></div></div></div></div>";


    $("#properties").append(moduleDiv);
    var Triangle = [$('#InputRadiusTriangle-' + (Triangles.length)).val(), $('#InputStrokeWidthTriangle-' + (Triangles.length)).val(), null, null, null, null, null, null, "Triangle", null, "#16264c", "#16264c", $('#InputTriangleCheckbox-' + (Triangles.length)).is(":checked")];
    //console.log(Triangle);
    Triangles.push(Triangle);

    updateLabels("Triangle #" + (Triangles.length - 1), "Triangle #" + (Triangles.length));

    updateColorPicker("TriangleColorFill-" + (Triangles.length - 1));
    updateColorPicker("TriangleColorStroke-" + (Triangles.length - 1));
    updateFillProperty("InputTriangleCheckbox-" + (Triangles.length - 1));

    updateTheCanvas();
  });
  $("#addsquare").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    if (checkAvailiblity(Squares, 5) == 0) {
      return;
    }
    var moduleDiv = "<div id='Square" + (Squares.length) + "' class='property'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;'>Properties</h5><h3>Square: " + (Squares.length + 1) + "</h3><div class='slidecontainer'><p>Fill Color:</p><input id='SquareColorFill-" + (Squares.length) + "' /></div><div class='slidecontainer'><p>Stroke Color:</p><input id='SquareColorStroke-" + (Squares.length) + "' /></div><div class='slidecontainer'>Stroke width:<span class='range-slider__value'>0</span><input type='range' id='InputStrokeWidthSquare-" + (Squares.length) + "' class='slider' min='1' max='20' value='1'></div><div class='slidecontainer'>Width:<span class='range-slider__value'>0</span><input type='range' id='InputRadiusSquare-" + (Squares.length) + "' class='slider' min='1' max='" + widthStage + "'' value=' 100'></div><div class='slidecontainer'>Height:<span class='range-slider__value'>0</span><input type='range' id='InputHeightSquare-" + (Squares.length) + "' class='slider' min='1' max='" + heightStage + "' value='100'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputSquareCheckbox-" + (Squares.length) + "'><label class='custom-control-label' for='InputSquareCheckbox-" + (Squares.length) + "'>Fill?</label></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputSquareAspect-" + (Squares.length) + "'><label class='custom-control-label' for='InputSquareAspect-" + (Squares.length) + "'>Maintain Aspect Ratio?</label></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns <b>Click Here</b></div></div></div></div>";
    $("#properties").append(moduleDiv);

    var Square = [$('#InputRadiusSquare-' + (Squares.length)).val(), $('#InputStrokeWidthSquare-' + (Squares.length)).val(), null, null, null, null, null, null, "Square", null, "#16264c", "#16264c", $('#InputHeightSquare-' + (Squares.length)).val(), $('#InputSquareCheckbox-' + (Squares.length)).is(":checked"), $('#InputSquareAspect-' + (Squares.length)).is(":checked")];

    Squares.push(Square);

    updateLabels("Square #" + (Squares.length - 1), "Square #" + (Squares.length));

    updateColorPicker("SquareColorFill-" + (Squares.length - 1));
    updateColorPicker("SquareColorStroke-" + (Squares.length - 1));
    updateFillProperty("InputSquareCheckbox-" + (Squares.length - 1));

    updateTheCanvas();
  });
  $("#addLine").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    if (checkAvailiblity(Lines, 5) == 0) {
      return;
    }
    var moduleDiv = " <div id='Line" + (Lines.length) + "' class='property'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;'>Properties</h5><h3>Line: " + (Lines.length + 1) + "</h3><div class='slidecontainer'><p>Fill Color:</p><input id='LineColorFillStroke-" + (Lines.length) + "' /></div><div class='slidecontainer'>Stroke width:<span class='range-slider__value'>0</span><input type='range' id='InputStrokeWidthLine-" + (Lines.length) + "' class='slider' min='1' max='30' value='15'></div><div class='slidecontainer'>Length:<span class='range-slider__value'>0</span><input type='range' id='InputLenghtLine-" + (Lines.length) + "' class='slider' min='1' max=" + stage.width() + " value=" + stage.width() / 2 + "></div><div class='slidecontainer'>Type:<select class='form-control' id='InputTypeLine-" + (Lines.length) + "'><option value='0'>Simple</option><option value='1'>Dashed</option><option value='2'>Arrow</option></select></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns <b>Click Here</b></div></div></div></div>";


    $("#properties").append(moduleDiv);
    var Line = [0, $('#InputStrokeWidthLine-' + (Lines.length)).val(), $('#InputLenghtLine-' + (Lines.length)).val(), "0", null, null, null, null, "Line", null, "#16264c", "#16264c"];
    //console.log(Line);
    Lines.push(Line);

    updateLabels("Line #" + (Lines.length - 1), "Line #" + (Lines.length));

    updateColorPicker("LineColorFillStroke-" + (Lines.length - 1));

    updateTheCanvas();
  });

  // $("#addBackground").click(function() {
  //   hideallproperties();
  //   if (checkAvailiblity(Backgrounds, 5) == 0) {
  //     return;
  //   }
  //   var moduleDiv = "<div id='Background" + (Backgrounds.length) + "' class='property'> <h3>Background: " + (Backgrounds.length + 1) + "</h3><div class='slidecontainer'>Background Type:<select class='form-control' id='backgroundType" + (Backgrounds.length) + "'><option value='1'>Fill</option><option value='2'>Gradient</option><option value='3' selected>Image</option></select></div><div class='slidecontainer' id='co'>Image:<input type='file' id='backgroundTypeInput" + (Backgrounds.length) + "' class='form-control'/></div><div class='slidecontainer'>        Horizontal Size:               <input type='range' id='backgroundStageX-" + (Backgrounds.length) + "'  class='slider' min='1' max='4' value='1'></div><div class='slidecontainer'>        Vertical Size:           <input type='range' id='backgroundStageY-" + (Backgrounds.length) + "'  class='slider' min='1' max='4' value='1'></div>Background Type:<select class='form-control' id='backgroundTypeLast-" + (Backgrounds.length) + "'><option value='1'>Multiply</option><option value='2'>No repeat</option><option value='3'>Adjust</option></select> </div>";
  //   $("#properties").append(moduleDiv);
  //    var Background = [];
  //    Backgrounds.push(Background);
  //    updateLabels("Background #" + (Backgrounds.length - 1), "Background #" + (Backgrounds.length));
  //    updateTheCanvas();
  // });
  $("#addBackground1").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    // if (checkAvailiblity(stageBackgrounds, 1) == 0) {
    //   return;
    // }
    console.log(stageBackgrounds, 'stageBackgrounds');

    if (openBack) {
      updateLabels("Background", "Background");
    }

    $('#stageBackground0').css('display', 'block');
    openBack = false;
  });
  //Adding Round text
  $("#addroundtext").click(function () {
    hideallproperties();
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    if (checkAvailiblity(RoundTexts, 7) == 0) {
      return;
    }
    //var moduleDiv = "<div id='RoundText"+(RoundTexts.length)+"' class='property'><h3>Round Text: "+(RoundTexts.length)+"'</h3>Text:<div class='slidecontainer'>        <input type='text' id='InputTextRoundText-"+(RoundTexts.length)+"'  class='form-control' value='Text around the circle'>      </div>      Radius:      <div class='slidecontainer'>        <input type='range' id='InputRadiusRoundText-"+(RoundTexts.length)+"'  class='slider' min='30' max='406' value='406'></div>      Spacing:      <div class='slidecontainer'>        <input type='range' id='InputSpacingRoundText-"+(RoundTexts.length)+"'  class='slider' min='1' max='10' value='1'>      </div>      Start Point:      <div class='slidecontainer'>        <input type='range' id='InputStartingPointRoundText-"+(RoundTexts.length)+"'  class='slider' min='0' max='360' value='0'>      </div>      Font:      <div class='slidecontainer'>        <select id='InputFontRoundText-"+(RoundTexts.length)+"' class='form-control'>          <option value='Arial' style='font-family: Arial' selected=''>Arial</option>          <option value='Calibri' style='font-family: Calibri'>Calibri</option>          <option value='Courier New' style='font-family: Courier New'>Courier New</option>          <option value='Tahoma' style='font-family: Tahoma'>Tahoma</option>          <option value='Times New Roma' style='font-family: Times New Roma'>Times New Roma</option>          <option value='Verdana' style='font-family: Verdana'>Verdana</option>          <option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option>          <option value='Days' style='font-family: Days'>Days</option>          <option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option>          <option value='Marck Script' style='font-family: Marck Script'>Marck Script</option>        </select>      </div>      Font Size:      <div class='slidecontainer'>        <select id='InputFontSizeRoundText-"+(RoundTexts.length)+"' class='form-control'>          <option>6</option>          <option>7</option>          <option>8</option>          <option>9</option>          <option>10</option>          <option>12</option>          <option>14</option>          <option>16</option>          <option selected=''>18</option>          <option>20</option>          <option>22</option>          <option>24</option>          <option>28</option>          <option>30</option>          <option>32</option>          <option>34</option>          <option>36</option>          <option>38</option>          <option>40</option>          <option>42</option>          <option>44</option>          <option>46</option>          <option>48</option>          <option>50</option>          <option>52</option>          <option>54</option>          <option>56</option>          <option>60</option>          <option>64</option>          <option>72</option>          <option>80</option>      </select>    </div>    <div class='slidecontainer'>      <input id='InputBoldRoundText-"+(RoundTexts.length)+"' type='button' class='btn btn-secondary' value='bold'>    </div>    <div class='slidecontainer'>      <input id='InputItalicRoundText-"+(RoundTexts.length)+"' type='button' class='btn btn-secondary' value='Italic'>    </div>  </div>";
    var moduleDiv = " <div id='RoundText" + (RoundTexts.length) + "' class='property'><div class='row'><div class='col-lg-12 col-md-12 col-sm-6 col-6'><div class='row'><div class='col-6 editor-btn'><div> <select id='InputFontRoundText-" + (RoundTexts.length) + "'class='form-control col-sm'><option value='Arial' style='font-family: Arial'selected='>Arial</option><option value=' Calibri'style='font-family: Calibri'>Calibri</option><option value='Courier New' style='font-family: Courier New'>Courier New</option><option value='Tahoma' style='font-family: Tahoma'>Tahoma</option><option value='Times New Roma' style='font-family: Times New Roma'>Times NewRoma</option><option value='Verdana' style='font-family: Verdana'>Verdana</option><option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option><option value='Days' style='font-family: Days'>Days</option><option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option><option value='Marck Script' style='font-family: Marck Script'>Marck Script</option></select></div></div><div class='col-6 editor-btn'><select id='InputFontSizeRoundText-" + (RoundTexts.length) + "'class='form-control col-sm'><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>12</option><option>14</option><option>16</option><option selected=''>18</option><option>20</option><option>22</option><option>24</option><option>28</option><option>30</option><option>32</option><option>34</option><option>36</option><option>38</option><option>40</option><option>42</option><option>44</option><option>46</option><option>48</option><option>50</option><option>52</option><option>54</option><option>56</option><option>60</option><option>64</option><option>72</option><option>80</option></select></div></div><div class='row mt-2'><div class='col-lg-6 col-md-7 col-sm-7 col-7 editor-btn'><div class='text-style-btns text-center'><button class='btn btn-sm modals'>B</button>|<button class='btn btn-sm modals'>I</button>|<button class='btn btn-sm modals'>U</button></div></div><div class='col-lg-6 col-md-5 col-sm-5 col-5 editor-btn'><div class='slidecontainer'>Color:<input id='RoundColor-" + (RoundTexts.length) + "' /></div></div><div class='col-12'>Text: <div class='slidecontainer'> <input type='text'id='InputTextRoundText-" + (RoundTexts.length) + "' class='text text-field' value='Text around the circle'></div></div></div></div><div class='col-lg-12 col-md-12 col-sm-6 col-6'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;'>Properties</h5><div class='slidecontainer'> Radius: <span class='range-slider__value'>0</span><input type='range' id='InputRadiusRoundText-" + (RoundTexts.length) + "' class='slider' min='30' max='406' value='150'> </div><div class='slidecontainer'> Spacing:<span class='range-slider__value'>0</span><input type='range' id='InputSpacingRoundText-" + (RoundTexts.length) + "'class='slider' min='1.00' max='10.00' value='1'> </div><div class='slidecontainer'> Start Point:<span class='range-slider__value'>0</span><input type='range' id='InputStartingPointRoundText-" + (RoundTexts.length) + "'class='slider' min='0' max='360' value='0'> </div><div class='slidecontainer' style='display:none'>Width:<span class='range-slider__value' style='display:none'>0</span><input type='range' id='InputWidthRoundText-" + (RoundTexts.length) + "' style='display:none' class='slider' min='1' max='200' value='100'></div><div class='slidecontainer' style='display:none'>Height:<span class='range-slider__value'>0</span><input type='range' style='display:none' id='InputHeightRoundText-" + (RoundTexts.length) + "' class='slider' min='1' max='200' value='100'></div><div class='custom-control custom-checkbox'><input type='checkbox' style='display:none' class='custom-control-input' id='InputRoundTextAspect-" + (RoundTexts.length) + "'><label style='display:none' class='custom-control-label'for='InputRoundTextAspect-" + (RoundTexts.length) + "'>Maintain AspectRatio?</label></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns<b>Click Here</b></div></div></div></div></div></div>";
    $("#properties").append(moduleDiv);
    var RoundText = [$('#InputRadiusRoundText-' + (RoundTexts.length)).val(), $('#InputSpacingRoundText-' + (RoundTexts.length)).val(), $('#InputStartingPointRoundText-' + (RoundTexts.length)).val(), $('#InputTextRoundText-' + (RoundTexts.length)).val(), $('#InputFontRoundText-' + (RoundTexts.length)).val(), $('#InputFontSizeRoundText-' + (RoundTexts.length)).val(), "normal", "normal", "Round Text", null, "#16264c"];

    RoundTexts.push(RoundText);

    updateLabels("RoundText #" + (RoundTexts.length - 1), "RoundText #" + (RoundTexts.length));
    updateTheCanvas();
    updateColorPicker("RoundColor-" + (RoundTexts.length - 1));
  });
  //Adding Line Text
  $("#addlinetext").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    if (checkAvailiblity(LineTexts, 10) == 0) {
      return;
    }
    // var moduleDiv = "<div id='LineText" + (LineTexts.length) + "' class='property'><div class='row'> <div class='col-lg-12 col-md-12 col-sm-6 col-6'><div class='row'><div class='col-6 editor-btn'><div><select id='InputFontLineText-" + (LineTexts.length) + "' class='form-control'><option value='Arial' style='font-family: Arial' selected=''>Arial</option><option value='Calibri' style='font-family: Calibri'>Calibri</option><option value='Courier New' style='font-family: Courier New'>Courier New</option><option value='Tahoma' style='font-family: Tahoma'>Tahoma</option><option value='Times New Roma' style='font-family: Times New Roma'>Times New Roma</option><option value='Verdana' style='font-family: Verdana'>Verdana</option><option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option><option value='Days' style='font-family: Days'>Days</option><option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option> <option value='Marck Script' style='font-family: Marck Script'>Marck Script</option></select></div></div><div class='col-6 editor-btn'><select id='InputFontSizeLineText-" + (LineTexts.length) + "' class='form-control'><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>12</option><option>14</option><option>16</option><option selected=''>18</option><option>20</option><option>22</option><option>24</option><option>28</option><option>30</option><option>32</option><option>34</option><option>36</option><option>38</option><option>40</option><option>42</option><option>44</option><option>46</option><option>48</option><option>50</option><option>52</option><option>54</option><option>56</option><option>60</option><option>64</option><option>72</option><option>80</option></select> </div></div><div class='row mt-2'><div class='col-lg-6 col-md-7 col-sm-7 col-7 editor-btn'><div class='text-style-btns text-center'><button class='btn btn-sm modals'>B</button> |<button class='btn btn-sm modals'>I</button> |<button class='btn btn-sm modals'>U</button></div></div><div class='col-lg-6 col-md-5 col-sm-5 col-5 editor-btn'><div class='slidecontainer' id='co'><input style='width:100%;height:100%' id='LineColorText-" + (LineTexts.length) + "' /></div></div></div></div><div class='col-lg-12 col-md-12 col-sm-6 col-6'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;'>Properties</h5><div class='slidecontainer'><p>Width: <span class='range-slider__value'>0</span></p><input type='range' id='InputWidthTextLine-" + (LineTexts.length) + "'class='slider' min='1' max='" + widthStage + "'' value=' 100'> </div><div class='slidecontainer'><p>Height:<span class='range-slider__value'>0</span></p><input type='range' id='InputHeightTextLine-" + (LineTexts.length) + "'class='slider' min='1' max='" + heightStage + "'' value=' 100'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputLineTextAspect-" + (LineTexts.length) + "'><label class='custom-control-label' for='InputLineTextAspect-" + (LineTexts.length) + "'>Maintain Aspect Ratio?</label></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>To view Instruction or 'How To'.<b>Click Here</b></div></div></div></div></div></div>";

    var moduleDiv = "<div id='LineText" + (LineTexts.length) + "' class='property'> <div class='row'> <div class='col-lg-12 col-md-12 col-sm-6 col-6'><div class='row'><div class='col-6 editor-btn'><div> <select id='InputFontLineText-" + (LineTexts.length) + "' class='form-control'> <option value='Arial' style='font-family: Arial' selected=''>Arial</option> <option value='Calibri' style='font-family: Calibri'>Calibri</option> <option value='Courier New' style='font-family: Courier New'>Courier New</option> <option value='Tahoma' style='font-family: Tahoma'>Tahoma</option> <option value='Times New Roma' style='font-family: Times New Roma'>Times New Roma</option> <option value='Verdana' style='font-family: Verdana'>Verdana</option> <option value='Comic Sans MS' style='font-family: Comic Sans MS'>Comic Sans MS</option> <option value='Days' style='font-family: Days'>Days</option> <option value='Simpleiriska' style='font-family: Simpleiriska'>Simpleiriska</option> <option value='Marck Script' style='font-family: Marck Script'>Marck Script</option> </select> </div></div> <div class='col-6 editor-btn'> <select id='InputFontSizeLineText-" + (LineTexts.length) + "' class='form-control'> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option> <option>12</option> <option>14</option> <option>16</option> <option selected=''>18</option> <option>20</option> <option>22</option> <option>24</option> <option>28</option> <option>30</option> <option>32</option> <option>34</option> <option>36</option> <option>38</option> <option>40</option> <option>42</option> <option>44</option> <option>46</option> <option>48</option> <option>50</option> <option>52</option> <option>54</option> <option>56</option> <option>60</option> <option>64</option> <option>72</option> <option>80</option> </select> </div></div> <div class='row mt-2'><div class='col-lg-6 col-md-7 col-sm-7 col-7 editor-btn'><div class='text-style-btns text-center'><button class='btn btn-sm modals'>B</button>|<button class='btn btn-sm modals'>I</button>|<button class='btn btn-sm modals'>U</button></div></div> <div class='col-lg-6 col-md-5 col-sm-5 col-5 editor-btn'> <div class='slidecontainer' id='co'><input style='width:100%;height:100%' id='LineColorText-" + (LineTexts.length) + "' /></div> </div><div class='col-12'>Text: <div class='slidecontainer'> <input type='text'id='InputTextLineText-" + (LineTexts.length) + "' class='text text-field' value='Text on the line'> </div></div> </div></div> <div class='col-lg-12 col-md-12 col-sm-6 col-6'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;''>Properties</h5> <div class='slidecontainer'  style='display:none'> Horizontal Position: <span class='range-slider__value'>0</span> <input type='range' id='InputHorizontalPositionLineText-" + (LineTexts.length) + "' class='slider' min='0' max='250' value='125'> </div> <div class='slidecontainer' style='display:none'> Vertical Position:<span class='range-slider__value'>0</span> <input type='range' id='InputVerticalPositionLineText-" + (LineTexts.length) + "' class='slider' min='0' max='280' value='120'> </div> <div class='slidecontainer' style='display:none;'> Rotation:<span class='range-slider__value'>0</span> <input type='range' id='InputRotationLineText-" + (LineTexts.length) + "' class='slider' min='0' max='360' value='0'> </div> <div class='slidecontainer'>Width:<span class='range-slider__value'>0</span><input type='range' id='InputWidthTextLine-" + (LineTexts.length) + "'  class='slider' min='1' max='" + widthStage + "'' value='100'></div><div class='slidecontainer'>Height:<span class='range-slider__value'>0</span><input type='range' id='InputHeightTextLine-" + (LineTexts.length) + "'  class='slider' min='1' max='" + heightStage + "'' value='100'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputLineTextAspect-" + (LineTexts.length) + "'><label class='custom-control-label' for='InputLineTextAspect-" + (LineTexts.length) + "'>Maintain Aspect Ratio?</label></div> </div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns <b>Click Here</b></div></div></div></div></div></div>";
    $("#properties").append(moduleDiv);
    var LineText = [$('#InputTextLineText-' + (LineTexts.length)).val(), $('#InputHorizontalPositionLineText-' + (LineTexts.length)).val(), $('#InputVerticalPositionLineText-' + (LineTexts.length)).val(), $('#InputRotationLineText-' + (LineTexts.length)).val(), $('#InputFontLineText-' + (LineTexts.length)).val(), $('#InputFontSizeLineText-' + (LineTexts.length)).val(), "normal", "normal", "Line Text", "#16264c"];
    // console.log("moduleDiv", moduleDiv)
    LineText[12] = $("#InputWidthTextLine-" + (LineTexts.length)).val();
    LineText[13] = $("#InputHeightTextLine-" + (LineTexts.length)).val();
    LineTexts.push(LineText);
    console.log("helllllooo==>>>", "LineText #" + (LineTexts.length - 1), "LineText #" + (LineTexts.length))
    updateLabels("LineText #" + (LineTexts.length - 1), "LineText #" + (LineTexts.length));
    // updateLabels("LineText #" + (LineTexts.length - 1), "LineText #" + (LineTexts.length));
    updateTheCanvas();
    rangeSlider();
    updateColorPicker("LineColorText-" + (LineTexts.length - 1));
  });

  $("#addimage").click(function () {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
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
    hideallproperties();
    var moduleDiv = "<div id='Picture" + (Pictures.length) + "' class='property'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;'>Properties</h5><h3>Image: " + (Pictures.length + 1) + "</h3>Image: <div class='slidecontainer'> <input type='file' id='InputPictureSrc-" + (Pictures.length) + "' name='files' /></div><div class='slidecontainer'>Width:<span class='range-slider__value'>0</span><input type='range' id='InputWidthImage-" + (Pictures.length) + "' class='slider' min='1' max='" + widthStage + "' value='100'></div><div class='slidecontainer'>Height:<span class='range-slider__value'>0</span><input type='range' id='InputHeightImage-" + (Pictures.length) + "' class='slider' min='1' max='" + heightStage + "' value='100'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputImageAspect-" + (Pictures.length) + "'><label class='custom-control-label' for='InputImageAspect-" + (Pictures.length) + "'>Maintain Aspect Ratio?</label></div><div class='slidecontainer'>Rotation:<span class='range-slider__value'>0</span><input type='range' id='InputPictureRotation-" + (Pictures.length) + "' class='slider' min='0' max='360' value='0'></div></div></div></div></div>";

    $("#properties").append(moduleDiv);
    var Picture = [($('#InputPictureSrc-' + (Pictures.length)).val() == null ? null : $('#InputPictureSrc-' + (Pictures.length)).val()), $('#InputPictureSize-' + (Pictures.length)).val(), $('#InputPictureHorizontalPosition-' + (Pictures.length)).val(), $('#InputPictureVerticalPosition-' + (Pictures.length)).val(), $('#InputPictureRotation-' + (Pictures.length)).val(), "Picture"];

    Pictures.push(Picture);
    rangeSlider();
    updateLabels("Picture #" + (Pictures.length - 1), "Image #" + (Pictures.length));
  });

  stageBackground();
  function stageBackground() {
    document.getElementsByClassName("mobile-view")[0].style.bottom = "3.8em"
    hideallproperties();
    var moduleDiv = "<div style='display:none;' id='stageBackground0' class='property'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-12 text-center'><div class='card properties-wrapper'><h5 class='heading' style='color: blue; border-bottom: 2px solid blue; padding-bottom: 20px;margin-bottom: 2em;''>Properties</h5> <h3>Background</h3><div class=' slidecontainer'>Background Type:<select class='form-control' id='stagebackgroundtype-0'><option value='1'>Fill</option><option value='2'>Gradient</option><option value='3' selected>Image</option></select></div><div id='appends'></div></div></div><div class='col-12 mt-2'><div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>Suggestions and concerns <b>Click Here</b></div></div></div></div>";
    $("#properties").append(moduleDiv);
    stageBackgrounds.push("3", "#ffffff");

    stageBackgrounds[5] = "data:image/svg+xml;base64,77u/PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPg0KICAgIDxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQogICAgICAgIGxpbmUgeyBzdHJva2U6ICNjY2M7IH0NCiAgICA8L3N0eWxlPg0KICAgIDxkZWZzPg0KICAgICAgICA8cGF0dGVybiBpZD0iZ3JpZCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgd2lkdGg9IjE1IiBoZWlnaHQ9IjE1Ij4NCiAgICAgICAgICAgIDxsaW5lIHgxPSI3LjUiIHkxPSIwIiB4Mj0iNy41IiB5Mj0iMTUiLz4NCiAgICAgICAgICAgIDxsaW5lIHgxPSIwIiB5MT0iNy41IiB4Mj0iMTUiIHkyPSI3LjUiLz4NCiAgICAgICAgPC9wYXR0ZXJuPg0KICAgIDwvZGVmcz4NCiAgICA8cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+DQo8L3N2Zz4=";

    imageStage();


    updateTheCanvas();

  }

  $(document).on("change", "#backgroundTypeInput0", function () {
    alert();
  });
  $(document).on("change", "#stagebackgroundtype-0", function () {
    var valueofelement = $(this).val();
    if (valueofelement == '1') {
      fillStage();

    }
    else if (valueofelement == '2') {
      gradientStage();
    }

    else {
      imageStage();
    }
  });
  $(document).on("change", "#stagebackgroundImageC-0", function () {

    stageBackgrounds[8] = $(this).val();
    updateTheCanvas();
  });



  function fillStage() {
    $("#appends").empty();
    var entry = "<div class='slidecontainer' id='co'>Fill Color:<input style='width:100%;height:100%' id='stageFill'/></div>";
    $("#appends").append(entry);

    $("#stageFill").spectrum({
      color: "#eaeaea",
      move: function (color) {
        stageBackgrounds[0] = "1";
        stageBackgrounds[1] = color.toHexString();
        updateTheCanvas();



      }
    });
    stageBackgrounds[0] = "1";

    stageBackgrounds[1] = "#eaeaea";
    updateTheCanvas();
  }


  function gradientStage() {
    $("#appends").empty();
    var entry = "<div class='slidecontainer' id='co'>First Color:<input style='width:100%;height:100%' id='gradientFill1'/></div><div class='slidecontainer' id='co'>First Color:<input style='width:100%;height:100%' id='gradientFill2'/></div> ";
    $("#appends").append(entry);

    $("#gradientFill2").spectrum({
      color: "#ffffff",
      move: function (color) {
        stageBackgrounds[2] = color.toHexString();
        updateTheCanvas();
      }
    });
    $("#gradientFill1").spectrum({
      color: "#000000",
      move: function (color) {
        stageBackgrounds[3] = color.toHexString();
        updateTheCanvas();
      }
    });
    stageBackgrounds[0] = "2";
    stageBackgrounds[2] = "#ffffff";
    stageBackgrounds[3] = "#000000";

    updateTheCanvas();


  }


  function imageStage() {
    $("#appends").empty();
    var entry = "<div class='slidecontainer' id='co'>Image:<input type='file' id='imgBackStage' class='form-control'/></div><div class='slidecontainer'>        Horizontal Size:               <input type='range' id='imgBackStageX-" + (RoundTexts.length) + "'  class='slider' min='1' max='4' value='1'></div><div class='slidecontainer'>        Vertical Size:           <input type='range' id='imgBackStageY-" + (RoundTexts.length) + "'  class='slider' min='1' max='4' value='1'></div><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='InputBackgroundCheckbox'><label class='custom-control-label' for='InputBackgroundCheckbox'>Maintain Aspect Ratio?</label></div>Background Type:<select class='form-control' id='stagebackgroundImageC-0'><option value='1'>Multiply</option><option value='2'>No repeat</option><option value='3'>Adjust</option></select>";
    $("#appends").append(entry);
    stageBackgrounds[0] = "3";

    $(document).on('change', 'input[type=file]', function () {
      var id = $(this).attr("id");
      if (id.indexOf("Stage") !== -1) {
        if (this.files && this.files[0]) {

          var FR = new FileReader();

          FR.addEventListener("load", function (e) {
            console.log(e.target, this.files)
            stageBackgrounds[5] = e.target.result;
            // var Background = [e.target.result, undefined, undefined, undefined, undefined, "Background"];
            // Backgrounds.push(Background);
            updateTheCanvas();

          });

          FR.readAsDataURL(this.files[0]);
        }


      }
    });
  }


  //Adding Images



  function updateFillProperty(ele) {
    console.log(ele);
    if (ele.indexOf('InputSquareCheckbox') !== -1) {
      $("#" + ele).on('change', function () {
        var indexofelement = ele.split("-").pop();
        Squares[indexofelement][13] = $(this).is(":checked");
        updateTheCanvas();
      });
    } else if (ele.indexOf('InputSquareAspect') !== -1) {
      $("#" + ele).on('change', function () {
        var indexofelement = ele.split("-").pop();
        Squares[indexofelement][14] = $(this).is(":checked");
        updateTheCanvas();
      });
    } else if (ele.indexOf('InputTriangleCheckbox') !== -1) {
      $("#" + ele).on('change', function () {
        var indexofelement = ele.split("-").pop();
        Triangles[indexofelement][12] = $(this).is(":checked");
        updateTheCanvas();
      });
    } else if (ele.indexOf('InputCircleCheckbox') !== -1) {
      $("#" + ele).on('change', function () {
        var indexofelement = ele.split("-").pop();
        Circles[indexofelement][12] = $(this).is(":checked");
        updateTheCanvas();
      });
    }
  }

  function updateColorPicker(ele) {
    $("#" + ele).spectrum({
      color: "#16264c",
      move: function (color) {

        if (ele.indexOf("CircleColorFill") !== -1) {
          var indexofelement = ele.split("-").pop();
          Circles[indexofelement][10] = color.toHexString();
          updateTheCanvas();
        } else if (ele.indexOf("Round") !== -1) {
          var indexofelement = ele.split("-").pop();
          RoundTexts[indexofelement][10] = color.toHexString();
          updateTheCanvas();
        } else if (ele.indexOf("LineColorText") !== -1) {
          var indexofelement = ele.split("-").pop();
          LineTexts[indexofelement][11] = color.toHexString();
          updateTheCanvas();
        } else if (ele.indexOf("CircleColorStroke") !== -1) {
          var indexofelement = ele.split("-").pop();
          Circles[indexofelement][11] = color.toHexString();
          updateTheCanvas();
        }
        else if (ele.indexOf("TriangleColorFill") !== -1) {
          var indexofelement = ele.split("-").pop();
          Triangles[indexofelement][10] = color.toHexString();
          updateTheCanvas();
        }
        else if (ele.indexOf("TriangleColorStroke") !== -1) {
          var indexofelement = ele.split("-").pop();
          Triangles[indexofelement][11] = color.toHexString();
          updateTheCanvas();
        }
        else if (ele.indexOf("SquareColorFill") !== -1) {
          var indexofelement = ele.split("-").pop();
          Squares[indexofelement][10] = color.toHexString();
          updateTheCanvas();
        }
        else if (ele.indexOf("SquareColorStroke") !== -1) {
          var indexofelement = ele.split("-").pop();
          Squares[indexofelement][11] = color.toHexString();
          updateTheCanvas();
        }
        else if (ele.indexOf("Stroke") !== -1) {
          var indexofelement = ele.split("-").pop();
          Lines[indexofelement][10] = color.toHexString();
          updateTheCanvas();
        }


      }
    });
  }

  $(document).on('click', '#Background', function () {
    $('#stageBackground0').css('display', 'block');
  });

  $(document).on('click', '.closeL', function (event) {

    transformer.nodes([]);

    var orignalid = $(this).attr('id');
    $(this).parent().parent().css("display", "none");
    $(this).parent().parent().attr("id", "deleted");
    var typeofelement = orignalid.split(' ')[0];
    var indexofelement = orignalid.split('#')[1];
    var deleteElement = [typeofelement, indexofelement];
    console.log(typeofelement, 'typeofelement')
    if (typeofelement == "Circle") {

      Circles[indexofelement].push("deleted");

    } else if (typeofelement == "LineText") {

      LineTexts[indexofelement].push("deleted");
    } else if (typeofelement == "RoundText") {

      RoundTexts[indexofelement].push("deleted");
    } else if (typeofelement == "Triangle") {

      Triangles[indexofelement].push("deleted");

    }
    else if (typeofelement == "Picture") {
      // $("#InputWidthImage-0").attr("id","InputWidthImage");
      // $("#InputHeightImage-0").attr("id","InputHeightImage");
      // $().attr("id","InputPictureSrc");
      deleteImageProp("#InputWidthImage-0");
      deleteImageProp("#InputHeightImage-0");
      deleteImageProp("#InputPictureSrc-0");
      deleteImageProp("#InputImageAspect-0");
      deleteImageProp("#InputPictureRotation-0");




      Pictures[indexofelement].push("deleted");
      base64First = "";
    }
    else if (typeofelement == "Square") {
      Squares[indexofelement].push("deleted");
    } else if (typeofelement == "Line") {
      Lines[indexofelement].push("deleted");
    } else if (typeofelement == "Background") {
      event.stopPropagation();
      $('#stageBackground0').css('display', 'none');
      stageBackgrounds[5] = "data:image/svg+xml;base64,77u/PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPg0KICAgIDxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQogICAgICAgIGxpbmUgeyBzdHJva2U6ICNjY2M7IH0NCiAgICA8L3N0eWxlPg0KICAgIDxkZWZzPg0KICAgICAgICA8cGF0dGVybiBpZD0iZ3JpZCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgd2lkdGg9IjE1IiBoZWlnaHQ9IjE1Ij4NCiAgICAgICAgICAgIDxsaW5lIHgxPSI3LjUiIHkxPSIwIiB4Mj0iNy41IiB5Mj0iMTUiLz4NCiAgICAgICAgICAgIDxsaW5lIHgxPSIwIiB5MT0iNy41IiB4Mj0iMTUiIHkyPSI3LjUiLz4NCiAgICAgICAgPC9wYXR0ZXJuPg0KICAgIDwvZGVmcz4NCiAgICA8cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+DQo8L3N2Zz4=";
      stageBackgrounds[6] = 1;
      stageBackgrounds[8] = null;

      imageStage();


      updateTheCanvas();

      openBack = true;
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
  })
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
  $(document).on('change input click', 'input[type=text],input[type=range], select, button:not(.close,.swal-button,.modals)', function () {
    // debugger;
    var idofelement = $(this).attr("id");
    var valueofelement = $(this).val();
    var indexofelement = idofelement.split("-").pop();

    if (idofelement.indexOf("stage") !== -1) {
      return;
    }
    //Checking if the element is circle
    if (idofelement.indexOf("Circle") !== -1) {
      if (idofelement.split('-')[0] == "InputRadiusCircle") {
        Circles[indexofelement][0] = valueofelement;
        updateTheCanvas();
      } else if (idofelement.split('-')[0] == "InputStrokeWidthCircle") {
        Circles[indexofelement][1] = valueofelement;
        updateTheCanvas();
      }

    } else if (idofelement.indexOf("Triangle") !== -1) {
      if (idofelement.split('-')[0] == "InputRadiusTriangle") {
        Triangles[indexofelement][0] = valueofelement;
        updateTheCanvas();
      } else if (idofelement.split('-')[0] == "InputStrokeWidthTriangle") {
        Triangles[indexofelement][1] = valueofelement;
        updateTheCanvas();
      }

    }
    else if (idofelement.indexOf("Square") !== -1) {
      if (idofelement.split('-')[0] == "InputRadiusSquare") {

        if ($('#InputSquareAspect-' + indexofelement).is(':checked')) {
          Squares[indexofelement][0] = valueofelement;
          Squares[indexofelement][12] = valueofelement;
          $('#InputHeightSquare-' + indexofelement).val(valueofelement);
        } else {
          Squares[indexofelement][0] = valueofelement;
        }
        updateTheCanvas();
      } else if (idofelement.split('-')[0] == "InputStrokeWidthSquare") {
        Squares[indexofelement][1] = valueofelement;
        updateTheCanvas();
      }
      else if (idofelement.split('-')[0] == "InputHeightSquare") {

        if ($('#InputSquareAspect-' + indexofelement).is(':checked')) {
          Squares[indexofelement][0] = valueofelement;
          Squares[indexofelement][12] = valueofelement;
          $('#InputRadiusSquare-' + indexofelement).val(valueofelement);
        } else {
          Squares[indexofelement][12] = valueofelement;
        }
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
      } else if (idofelement.split('-')[0] == "InputWidthRoundText") {

        if ($('#InputRoundTextAspect-' + indexofelement).is(':checked')) {
          RoundTexts[indexofelement][11] = valueofelement;
          RoundTexts[indexofelement][12] = valueofelement;
          $('#InputHeightRoundText-' + indexofelement).val(valueofelement);
        } else {
          RoundTexts[indexofelement][11] = valueofelement;
        }
      }
      else if (idofelement.split('-')[0] == "InputHeightRoundText") {

        if ($('#InputRoundTextAspect-' + indexofelement).is(':checked')) {
          RoundTexts[indexofelement][11] = valueofelement;
          RoundTexts[indexofelement][12] = valueofelement;
          $('#InputWidthRoundText-' + indexofelement).val(valueofelement);
        } else {
          RoundTexts[indexofelement][12] = valueofelement;
        }

      }
      updateTheCanvas();



    } else if (idofelement.indexOf("LineText") !== -1 || idofelement.indexOf("TextLine") !== -1) {
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
      } else if (idofelement.split('-')[0] == "InputWidthTextLine") {

        if ($('#InputLineTextAspect-' + indexofelement).is(':checked')) {
          LineTexts[indexofelement][12] = valueofelement;
          LineTexts[indexofelement][13] = valueofelement;
          $('#InputHeightTextLine-' + indexofelement).val(valueofelement);
        } else {
          LineTexts[indexofelement][12] = valueofelement;
        }
      }
      else if (idofelement.split('-')[0] == "InputHeightTextLine") {

        if ($('#InputLineTextAspect-' + indexofelement).is(':checked')) {
          LineTexts[indexofelement][12] = valueofelement;
          LineTexts[indexofelement][13] = valueofelement;
          $('#InputWidthTextLine-' + indexofelement).val(valueofelement);
        } else {
          LineTexts[indexofelement][13] = valueofelement;
        }

      }

      updateTheCanvas();
    } else if (idofelement.indexOf("Picture") !== -1 || idofelement.indexOf("Image") !== -1) {

      var theElementInputId = idofelement.split('-')[0];
      if (theElementInputId == "InputPictureHorizontalPosition") {
        Pictures[indexofelement][2] = valueofelement;
      } else if (theElementInputId == "InputPictureVerticalPosition") {
        Pictures[indexofelement][3] = valueofelement;
      } else if (theElementInputId == "InputPictureSize") {
        Pictures[indexofelement][1] = valueofelement;
      } else if (theElementInputId == "InputPictureRotation") {
        Pictures[indexofelement][4] = valueofelement;
      }
      else if (idofelement.split('-')[0] == "InputWidthImage") {

        if ($('#InputImageAspect-' + indexofelement).is(':checked')) {
          Pictures[indexofelement][10] = valueofelement;
          Pictures[indexofelement][11] = valueofelement;
          $('#InputHeightImage-' + indexofelement).val(valueofelement);
        } else {
          Pictures[indexofelement][10] = valueofelement;
        }
      }
      else if (idofelement.split('-')[0] == "InputHeightImage") {

        if ($('#InputImageAspect-' + indexofelement).is(':checked')) {
          Pictures[indexofelement][10] = valueofelement;
          Pictures[indexofelement][11] = valueofelement;
          $('#InputWidthImage-' + indexofelement).val(valueofelement);
        } else {
          Pictures[indexofelement][11] = valueofelement;
        }
      }
      updateTheCanvas();
    } else if (idofelement.indexOf("Line") !== -1) {
      if (idofelement.split('-')[0] == "InputStrokeWidthLine") {
        Lines[indexofelement][1] = valueofelement;
        updateTheCanvas();
      } else if (idofelement.split('-')[0] == "InputLenghtLine") {
        Lines[indexofelement][2] = valueofelement;
        updateTheCanvas();
      }
      else if (idofelement.split('-')[0] == "InputTypeLine") {
        Lines[indexofelement][3] = valueofelement;
        updateTheCanvas();
      }

    }
    else if (idofelement.indexOf("stage") !== -1 || idofelement.indexOf("Stage") !== -1) {

      console.log(idofelement);
      if (idofelement.split('-')[0] == "stagebackgroundtype") {
        $("#appends").empty();

        if (valueofelement == '1') {
          fillStage();

        }
        if (valueofelement == '2') {
          gradientStage();
        }


      } else if (idofelement.split('-')[0] == "imgBackStageX") {
        if ($('#InputBackgroundCheckbox').is(':checked')) {
          stageBackgrounds[6] = valueofelement;
          stageBackgrounds[7] = valueofelement;
          $('#imgBackStageY-0').val(valueofelement);
        } else {
          stageBackgrounds[6] = valueofelement;
        }
        updateTheCanvas();
      } else if (idofelement.split('-')[0] == "imgBackStageY") {
        if ($('#InputBackgroundCheckbox').is(':checked')) {

          stageBackgrounds[6] = valueofelement;
          stageBackgrounds[7] = valueofelement;
          $('#imgBackStageX-0').val(valueofelement);
        } else {
          stageBackgrounds[7] = valueofelement;
        }
        updateTheCanvas();
      }
      else if (idofelement.split('-')[0] == "stagebackgroundImageC") {
        stageBackgrounds[8] = valueofelement;
        updateTheCanvas();
      }


    }

  });
})





//  $(document).on('change', '[id^=customCheckbox]', function(event){
//   console.log(event, this);
//  });


$('input[type=range]').on('input', function () {
  $(this).trigger('change');
});


$(document).on('change', 'input[type=file]', function () {
  if (this.files && this.files[0]) {

    var FR = new FileReader();
    var id = $(this).attr("id");
    if (id.indexOf('Stage') !== -1) {
      return;
    }
    console.log("lol");
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
      updateTheCanvas();
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
    data: { id: s },
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
  $("#signUp").click(function () { });

});

function CheckValidation(customLang, id) {
  if (customLang == true) {
    $(id + "").attr("required", "true");
  } else {
    $(id + "").removeAttr("required");
  }
}
function up(_obj) {
  var main = $(_obj).parent().parent();
  var prev = main.prev();
  if (main.index() == 0) return;
  main.remove();
  main.insertBefore(prev);

  var ele_canvas = group.getChildren();

  var maxZindex = ele_canvas.length;

  $('.elementlabel').each(function (i, obj) {
    var name = $(this).attr("id").split("#")[0];
    var index = $(this).attr("id").split("#")[1];
    console.log(name);
    if (name.indexOf("Circle") !== -1) {
      ALL_CIRCLE_DOM[index].zIndex((maxZindex-- - 1));
    } else if (name.indexOf("Square") !== -1) {
      ALL_SQUARE_DOM[index].zIndex((maxZindex-- - 1));
    }
    else if (name.indexOf("RoundText") !== -1) {
      ALL_RTEXT_DOM[index].zIndex((maxZindex-- - 1));
    }
    else if (name.indexOf("LineText") !== -1) {
      ALL_TEXT_DOM[index].zIndex((maxZindex-- - 1));
    }
    else if (name.indexOf("Picture") !== -1) {
      ALL_IMAGE_DOM[index].zIndex((maxZindex-- - 1));
    } else if (name.indexOf("Line") !== -1) {
      ALL_LINE_DOM[index].zIndex((maxZindex-- - 1));
    } else if (name.indexOf("Triangle") !== -1) {
      ALL_TRIANGLE_DOM[index].zIndex((maxZindex-- - 1));
    }

  });
  layer.batchDraw();
}
function down(_obj) {
  var main = $(_obj).parent().parent();
  var prev = main.next();
  if (main.index() == ($("#labels").children().length - 1)) {
    return;
  }
  main.remove();
  main.insertAfter(prev);

  var ele_canvas = group.getChildren();

  var maxZindex = ele_canvas.length;

  $('.elementlabel').each(function (i, obj) {
    var name = $(this).attr("id").split("#")[0];
    var index = $(this).attr("id").split("#")[1];
    console.log(name);
    if (name.indexOf("Circle") !== -1) {
      ALL_CIRCLE_DOM[index].zIndex((maxZindex-- - 1));
    } else if (name.indexOf("Square") !== -1) {
      ALL_SQUARE_DOM[index].zIndex((maxZindex-- - 1));
    }
    else if (name.indexOf("RoundText") !== -1) {
      ALL_RTEXT_DOM[index].zIndex((maxZindex-- - 1));
    }
    else if (name.indexOf("LineText") !== -1) {
      ALL_TEXT_DOM[index].zIndex((maxZindex-- - 1));
    }
    else if (name.indexOf("Picture") !== -1) {
      ALL_IMAGE_DOM[index].zIndex((maxZindex-- - 1));
    } else if (name.indexOf("Line") !== -1) {
      ALL_LINE_DOM[index].zIndex((maxZindex-- - 1));
    } else if (name.indexOf("Triangle") !== -1) {
      ALL_TRIANGLE_DOM[index].zIndex((maxZindex-- - 1));
    }

  });
  layer.batchDraw();
}
function downloadKonvaImage() {
  if (openBack) {
    stageBackgroundRect.fillPriority('fill');
    stageBackgroundRect.fill("#ffffff");
    layer.batchDraw();

  }
  var dataURL = stage.toDataURL({ pixelRatio: 3 });
  downloadURI(dataURL, 'stage.png');

  updateTheCanvas();

}
function downloadURI(uri, name) {


  var link = document.createElement('a');
  link.download = name;
  link.href = uri;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  delete link;
}

function downloadKonvaPDF() {

  if (openBack) {
    stageBackgroundRect.fillPriority('fill');
    stageBackgroundRect.fill("#ffffff");
    layer.batchDraw();

  }
  let orientation = 'p'
  if (window.is_potrait) {
    orientation = 'p';
  } else {
    orientation = 'l';
  }
  var pdf = new jsPDF(orientation, 'pt', [stage.width() + 50, stage.height() + 50]);
  pdf.setTextColor('#000000');
  // first add texts
  // stage.find('Text').forEach((text) => {
  //   const size = text.fontSize() / 0.75; // convert pixels to points
  //   pdf.setFontSize(size);
  //   pdf.text(text.text(), text.x(), text.y(), {
  //     baseline: 'top',
  //     angle: -text.getAbsoluteRotation(),
  //   });
  // });

  // then put image on top of texts (so texts are not visible)
  pdf.addImage(
    stage.toDataURL({ pixelRatio: 3 }),
    25,
    25,
    stage.width(),
    stage.height()
  );

  pdf.save('canvas.pdf');
  updateTheCanvas();

}
function deleteImageProp(id) {
  $(id).attr("id", "");
}