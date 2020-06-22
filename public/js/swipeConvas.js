//Получение холста и его контекста
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

//Чувствительность — количество пикселей, после которого жест будет считаться свайпом
const sensitivity = 20;


var touchStart = null; //Точка начала касания
var touchPosition = null; //Текущая позиция

//Перехватываем события
canvas.addEventListener("touchstart", function (e) { TouchStart(e); }); //Начало касания
canvas.addEventListener("touchmove", function (e) { TouchMove(e); }); //Движение пальцем по экрану
//Пользователь отпустил экран
canvas.addEventListener("touchend", function (e) { TouchEnd(e, "rgba(0, 0, 0, 0)"); });
//Отмена касания
canvas.addEventListener("touchcancel", function (e) { TouchEnd(e, "white"); });

function TouchStart(e)
{
    //Получаем текущую позицию касания
    touchStart = { x: e.changedTouches[0].clientX, y: e.changedTouches[0].clientY };
    touchPosition = { x: touchStart.x, y: touchStart.y };
}

function TouchMove(e)
{
    //Получаем новую позицию
    touchPosition = { x: e.changedTouches[0].clientX, y: e.changedTouches[0].clientY };
}

function TouchEnd(e, color)
{
    //DrawLine(); //Рисуем линию между стартовой и конечной точками
    //Draw(touchPosition.x, touchPosition.y, 6, color); //Рисуем конечную точку

    CheckAction(); //Определяем, какой жест совершил пользователь

    //Очищаем позиции
    touchStart = null;
    touchPosition = null;
}

function CheckAction()
{
    var d = //Получаем расстояния от начальной до конечной точек по обеим осям
    {
   	 x: touchStart.x - touchPosition.x,
   	 y: touchStart.y - touchPosition.y
    };

    if(Math.abs(d.x) > Math.abs(d.y)) //Проверяем, движение по какой оси было длиннее
    {
   	 if(Math.abs(d.x) > sensitivity) //Проверяем, было ли движение достаточно длинным
   	 {
   		 if(d.x > 0) //Если значение больше нуля, значит пользователь двигал пальцем справа налево
   		 {
			 window.history.forward();
   			 console.log("Swipe Left");
   		 }
   		 else //Иначе он двигал им слева направо
   		 {
			 window.history.back();
   			 console.log("Swipe Right");
   		 }
   	 }
    }
    else //Аналогичные проверки для вертикальной оси
    {
   	 if(Math.abs(d.y) > sensitivity)
   	 {
   		 if(d.y > 0) //Свайп вверх
   		 {
   			 console.log("Swipe up");
   		 }
   		 else //Свайп вниз
   		 {
   			 console.log("Swipe down");
   		 }
   	 }
    }
}

//InitApp(); //Инициализировать приложение

//window.addEventListener("resize", InitApp); //При растягивании окна приложение будет инициализироваться заново

function InitApp() //Растягиваем холст на весь экран
{
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}