//m/d/Y
var end = new Date('08/30/2020 12:00 PM');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            //document.getElementById('countdown').innerHTML = 'EXPIRED!';
			document.getElementById('countdown').innerHTML = '<strong>¡Aviso!</strong> Estimado usuario, el registro de proyectos a la plataforma PROFEST 2020 ha concluido.';
            window.location="index_cierre.php";
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        //document.getElementById('countdown').innerHTML = '<strong>¡Aviso!</strong>Estimado usuario, el registro de proyectos a la plataforma PROFEST 2019 concluira en<strong> ' + days + ' dias, ';
       // document.getElementById('countdown').innerHTML = '<strong>¡Aviso!</strong>Estimado usuario, el registro de proyectos a la plataforma PROFEST 2019 concluira en<strong> ' + hours + ' horas, ';
        document.getElementById('countdown').innerHTML = '<strong>¡Aviso! </strong>Estimado usuario, el registro de proyectos a la plataforma PROFEST 2020 concluirá en<strong> ' + hours + ' horas, ' + minutes + ' minutos y </strong>';
        document.getElementById('countdown').innerHTML += '<strong>' + seconds + ' segundos</strong>.';
	}
    timer = setInterval(showRemaining, 1000);
