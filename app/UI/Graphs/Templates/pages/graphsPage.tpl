
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js "></script>

<label>{$MGLANG->T('period')}</label>
<select class="form-control" id="timePeriod" style="margin-bottom:20px;">
    <option value="day">{$MGLANG->T('lastHours')}</option>
    <option value="week">{$MGLANG->T('lastWeek')}</option>
    <option value="month">{$MGLANG->T('lastMonth')}</option>
</select>

<div><canvas style="margin-bottom:30px" id="bandwidth" width="400" height="250"></canvas></div>
<div><canvas style="margin-bottom:30px" id="cpu" width="400" height="250"></canvas></div>
<div><canvas style="margin-bottom:30px" id="averageio" width="400" height="250"></canvas></div>
<div><canvas style="margin-bottom:30px" id="averagedisk" width="400" height="250"></canvas></div>