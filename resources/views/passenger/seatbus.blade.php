<html lang="en">
<head>
  <title>gray Bus | Book your seat</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Book Your Bus Seat Online">
  <meta name="keywords" content="seat booking,bus booking,online seat booking">
  <meta name="author" content="soumya pal">
  <style>
    body {font-family: 'Roboto', sans-serif;}
ul,li,body,a,span,lable,em,
h1,h2,h3,h4,h5,h6{margin:0;padding:0;color: #000;}
a,a:hover {text-decoration: none;color: #000;}
img {max-width: 100%;}

.noselect {
    -webkit-user-select: none; 
    -moz-user-select: none; 
    -ms-user-select: none; 
    user-select: none; 
}
            
.container{margin:40px auto 120px;display:table;}

            
.seat_bk_con{/*max-width: 250px;*/margin: 0 auto;}

.info_tag_container {
    width:100%;
    display:inline-block;
    margin-bottom:40px;
    border-bottom:1px solid #000;
    font-size: 0;
    text-align: center;
}
.info_tag_container h4 {
    font-size: 24px;
    margin-bottom: 15px;
}
.seat_tag {
    width: 25%;
    display: inline-block;
    vertical-align: top;
}
.seat_tag img {
    max-width: 32px;
}
.seat_tag span {
    font-size: 12px;
    display: block;
    margin: 5px 0 10px;
}



.bus_container {
    text-align: center;
}

.bus{
    padding:80px 0 0;
    background-color:#fffff5;
    border-radius:10px;
    border:1px solid #a7a7a7;
    background-image:url(../images/driver.png);
    background-size:40px;
    background-repeat:no-repeat;
    background-position:right 20px top 15px;
    margin: 0;
    display:inline-block;
    vertical-align: top;
    font-size: 0;
}

.bus li{
    display: block;
    margin: 4px 0;
    position: relative;
}

.seat{
    position: relative;
    height:45px;
    width:44px;
    margin:5px;
    display:inline-block;
    vertical-align:top;
    /*background-image:url('../images/seat.png');
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
		background-color:transparent;*/
		background: gray;
    border:0;
    -webkit-box-shadow:none;
  	box-shadow:none;
    -webkit-border-radius:0;
  	border-radius:0;
    cursor: pointer;
    transition: all .4s ease-out;
    -webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    -ms-transition: all .4s ease;
    -o-transition: all .4s ease;
}
.seat:hover{
	/*background-image:url('../images/hvr_seat.png');*/
	background: green;
}

.bus li:last-child {margin-bottom:0;}
.bus li:last-child .seat{width:42.3px;margin:5px 3px;}
.bus li:last-child .seat:first-child{margin-left:5px;}
.bus li:last-child .seat:last-child{margin-right:5px;}

.passage{
    width:25px;
    height:45px;
    display:inline-block;
    vertical-align:top;
    margin: 5px;
}
.door_passage{width:45px;}

.seat_num{
    line-height:45px;
    text-align:center;
    font-size:14px;
    display:block;
    color: #000;
    text-shadow: 0 0 5px rgba(255,255,255,0.9);
    transition: all .4s ease-in;
    -webkit-transition: all .4s ease-in;
    -moz-transition: all .4s ease-in;
    -ms-transition: all .4s ease-in;
    -o-transition: all .4s ease-in;
}
.seat:hover .seat_num{
    color: #fff;
    text-shadow: 0 0 5px rgba(0,0,0,0.9);
}

/*--user booked seat*/
.my_seat,.my_seat:hover{
	/*background-image:url(../images/bk_seat.png);*/
	background: skyblue;
	}
/*--male booked seat*/
.maleBook_seat,.maleBook_seat:hover{
	/*background-image:url(../images/m_seat.png);*/
	background: green;
	}
/*--female booked seat*/
.femaleBook_seat,.femaleBook_seat:hover{
	/*background-image:url(../images/fm_seat.png);*/
	background: red;
	}

/*--booked seat--------------*/
.booked_seat,
.booked_seat .seat_num,
.booked_seat:hover .seat_num { 
    pointer-events:none;
    cursor:not-allowed;
    color: #fff;
}

/*-popup checkbox*/
.pop_con{
    width: 78px;
    position: absolute;
    background: #585757;
    -webkit-border-radius: 50px;
    border-radius: 50px;
    margin-top: -50px;
    top: -100%;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
    display: inline-block;
    opacity: 0;
    transition: all .4s ease-in;
    -webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    -ms-transition: all .4s ease;
    -o-transition: all .4s ease;
    visibility: hidden;
    -webkit-visibility: hidden;
    -moz-visibility: hidden;
    -ms-visibility: hidden;
    -o-visibility: hidden; 
}
/*show popup*/
.pop_con.show {
    margin-top: -10px;
    opacity: 1; 
    visibility: visible;
    -webkit-visibility: visible;
    -moz-visibility: visible;
    -ms-visibility: visible;
    -o-visibility: visible;
}
.bus-check {
    display: inline-block;
    cursor: pointer;
    margin: 5px;
    position: relative;
}
/*hide checkbox*/
.bus-check input[type='checkbox'] {
    visibility: hidden;
    -webkit-visibility: hidden;
    -moz-visibility: hidden;
    -ms-visibility: hidden;
    -o-visibility: hidden;
    opacity: 0;
    position: absolute;
}
.bus-check input[type='checkbox'] + span {
    width: 25px;
    height: 25px;
    /*background-color: #e6e6e6;*/
    border: 2px solid #bfbfbf;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
    transition: all .4s ease-in;
    -webkit-transition: all .4s ease-in;
    -moz-transition: all .4s ease-in;
    -ms-transition: all .4s ease-in;
    -o-transition: all .4s ease-in;
}
.bus-check input[type='checkbox']:checked + span {
    background-color: #fff;
    border: 2px solid #0cff16;
}
.male span {
    /*background: url(../images/mu.png) no-repeat center center;*/
			background: green;
}
.female span {
    /*background: url(../images/fmu.png) no-repeat center center;*/
		background: red;
}
.btm_arrow {
    position: absolute;
    bottom: -12px;
    left: 50%;
    -webkit-transform: translatex(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
    display: block;
    margin: 0 auto;
    width: 30px;
    height: 15px;
    background: url('../images/box_arrow.png') no-repeat center center;
}
  </style>
</head>
<body>
        <div class="container noselect">
            <h1>Tour Bus</h1>
            <div class="seat_bk_con">
                <div class="info_tag_container">
                    <h4>Seat Information</h4>
                    <div class="seat_tag_container">
                        <div class="seat_tag">
                            <img src="images/seat.png" alt="">
                            <span>Null</span>
                        </div>
                        <div class="seat_tag">
                            <img src="images/bk_seat.png" alt="">
                            <span>your booking</span>
                        </div>
                        <div class="seat_tag">
                            <img src="images/fm_seat.png" alt="">
                            <span>Booked - female</span>
                        </div>
                        <div class="seat_tag">
                            <img src="images/m_seat.png" alt="">
                            <span>Booked - male</span>
                        </div>
                    </div>
                </div>
                
                <div class="bus_container">
                    <ul class="bus bus2">
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <span class="passage"></span>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                    </li>
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <span class="passage"></span>
                        
                        <a class="seat"></a>
                        
                        <a class="seat booked_seat my_seat"></a>
                    </li>
                    <li>
                        <a class="seat"></a>
                    
                        <a class="seat add_popup">
                            <div class="pop_con show">
                                <label class="bus-check male">
                                    <input type="checkbox" name="chk">
                                    <span></span>
                                </label>
                                <label class="bus-check female">
                                    <input type="checkbox" name="chk">
                                    <span></span>
                                </label>
                                <span class="btm_arrow"></span>
                            </div>
                        </a>
                        
                        <span class="passage"></span>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                    </li>
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <span class="passage"></span>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                    </li>
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat booked_seat femaleBook_seat"></a>
                        
                        <span class="passage"></span>
                        
                        <span class="passage door_passage"></span>
                        
                        <span class="passage door_passage"></span>
                        
                    </li>
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <span class="passage">11</span>
                        
                        <a class="seat">11</a>
                        
                        <a class="seat"></a>
                    </li>
                    <li>
                        <a class="seat booked_seat maleBook_seat"></a>
                        
                        <a class="seat"></a>
                        
                        <span class="passage"></span>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                    </li>
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <span class="passage"></span>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                    </li>
                    <li>
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                        
                        <a class="seat"></a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
    
    /*print seat number--------------*/
        
        /*---for bus1----*/
        var b1=0;
        $(".bus1 .seat").each(function() { 
            b1++;
           $(this).append("<em class='seat_num'>"+b1+"</em>");
        }); 
        
        /*---for bus2----*/
        var b2=0;
        $(".bus2 .seat").each(function() { 
            b2++;
           $(this).append("<em class='seat_num'>"+b2+"</em>");
        });
    /*end print seat number-----------*/
        
        
        
        
    /*open popup------------------*/
        var chk_name=0; //create input name
        
        $('.seat').click(function(e){
            /*show-hide popup*/
             $('.seat .pop_con').removeClass('show');
            
            if( $(this).hasClass('add_popup') ){
                /*e.preventDefault();*/
                /*show-hide popup*/
                $(this).children('.pop_con').addClass('show');
            }
            /*end if---------*/
            else {
                /*add popup structure*/
                $(this).append("<div class='pop_con'>"+
                                    "<label class='bus-check male'>"+
                                        "<input type='checkbox' name='chk"+chk_name+"'>"+
                                        "<span></span>"+
                                    "</label>"+
                                    "<label class='bus-check female'>"+
                                        "<input type='checkbox' name='chk"+chk_name+"'>"+
                                        "<span></span>"+
                                    "</label>"+
                                    "<span class='btm_arrow'></span>"+
                               "</div>");
                
                /*show-hide popup*/
                $(this).addClass('add_popup');
                $(this).children('.pop_con').addClass('show');
                
                chk_name++;//create input name -increment
            }
            /*end else---------*/
        });
    /*end clicked item--------------------*/
        
    });
        </script>
</body>
</html>