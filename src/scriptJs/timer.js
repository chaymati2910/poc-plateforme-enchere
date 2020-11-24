function myTimer(fin, actuel) {
    var v_fin = fin;
    var v_actuel = actuel; 
    var myVar = setInterval(timer(v_fin, v_actuel), 1000);
    function timer(v_fin, v_actuel){
        return v_fin - v_actuel;
    }
}