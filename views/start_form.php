
<form class="form-inline" id="resources"  action="make_workout.php" method="get">
    <fieldset>
        <legend>I have access to:</legend>
        <div class="form-group">
            <input class="form-control" name="have[]" value = "1" type="checkbox" checked/> Partner<br/>
            <input class="form-control" name="have[]" value = "2" type="checkbox" checked/> Open space to run<br/>
            <input class="form-control" name="have[]" value = "4" type="checkbox" checked/> Bench/ledge/low wall<br/>
            <input class="form-control" name="have[]" value = "3" type="checkbox" checked/> High wall/sturdy tree<br/>
            <input class="form-control" name="have[]" value = "5" type="checkbox" checked/> Flight of steps<br/>
            <input class="form-control" name="have[]" value = "6" type="checkbox" checked/> pullup bar equivalent<br/>
        </div>  
    </fieldset>


    <fieldset>
        <legend>My workout should have: </legend>
        (Leave defaults for 15-20 min workout) <br/><br/>
        <div class="form-group">
            This many sets:
            <select class="form-control" name="sets"> 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3" selected>3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br/>
            Rotating this many different exercises in each set:
            <select class="form-control" name="exercises_per_set"> 
                <option value="4" selected>4</option>
                <option value="6">6</option>
                <option value="8">8</option>
            </select>
        </div>
    </fieldset>

        <input type="submit" value="Submit">


</form>
            
        
