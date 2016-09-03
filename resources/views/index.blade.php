@extends('layout.default')

@section('content')
<ul class="tab">
    <li><a href="#" class="tablinks" onclick="openTab(event, 'Timer')"><b>Timer</b></a></li>
    <li><a href="#" class="tablinks" onclick="openTab(event, 'RemoteControl')"><b>Remote Control</b></a></li>
    <li><a href="#" class="tablinks" onclick="openTab(event, 'Schedule')"><b>Schedule</b></a></li>
</ul>

<div id="Timer" class="tabcontent">
    {!! Form::open(array('url' => '/save/timer', 'method' => 'POST', 'class' => 'form',  'enctype' => 'multipart/form-data')) !!}

    <form>
        <div class="form-group ">
          <label for="appliances">Appliances</label>
          {!! Form::select('appliance',
             $appliances,
             0,
             ['class' => 'form-control']
          ) !!}
        </div>
        <div class="form-group">
          <label for="switch">Switch:</label>
          {!! Form::radio('switch', '1', ['class' => 'radio-inline']) !!} On
          {!! Form::radio('switch', '0', ['class' => 'radio-inline']) !!} Off
        </div>
        <div class="form-group">
          <label for="calendar">Date</label>
         {!! Form::text('date', '', array('class' => 'form-control', 'id' => 'datepicker', 'name' => 'datepicker')) !!}
        </div>
        <div class="form-group">
          <label for="hour">HR</label>
         {!! Form::select('hour', [
             '00' => '00',
             '01' => '01',
             '02' => '02',
             '03' => '03',
             '04' => '04',
             '05' => '05',
             '06' => '06',
             '07' => '07',
             '08' => '08',
             '09' => '09',
             '10' => '10',
             '11' => '11',
             '12' => '12',
             '13' => '13',
             '14' => '14',
             '15' => '15',
             '16' => '16',
             '17' => '17',
             '18' => '18',
             '19' => '19',
             '20' => '20',
             '21' => '21',
             '22' => '22',
             '23' => '23',
             '24' => '24'
             ],
             00,
             ['class' => 'form-control']
          ) !!}
          <label for="minute">Mins</label>
         {!! Form::select('minute', [
             '00' => '00',
             '01' => '01',
             '02' => '02',
             '03' => '03',
             '04' => '04',
             '05' => '05',
             '06' => '06',
             '07' => '07',
             '08' => '08',
             '09' => '09',
             '10' => '10',
             '11' => '11',
             '12' => '12',
             '13' => '13',
             '14' => '14',
             '15' => '15',
             '16' => '16',
             '17' => '17',
             '18' => '18',
             '19' => '19',
             '20' => '20',
             '21' => '21',
             '22' => '22',
             '23' => '23',
             '24' => '24',
             '25' => '25',
             '26' => '26',
             '27' => '27',
             '28' => '28',
             '29' => '29',
             '30' => '30',
             '31' => '31',
             '32' => '32',
             '33' => '33',
             '34' => '34',
             '35' => '35',
             '36' => '36',
             '37' => '37',
             '38' => '38',
             '39' => '39',
             '40' => '40',
             '41' => '41',
             '42' => '42',
             '43' => '43',
             '44' => '44',
             '45' => '45',
             '46' => '46',
             '47' => '47',
             '48' => '48',
             '49' => '49',
             '50' => '50',
             '51' => '51',
             '52' => '52',
             '53' => '53',
             '54' => '54',
             '55' => '55',
             '56' => '56',
             '57' => '57',
             '58' => '58',
             '59' => '59'
             ],
             00,
             ['class' => 'form-control']
          ) !!}
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </form>
    {!! Form::close() !!}
</div>

<div id="RemoteControl" class="tabcontent">
    {!! Form::open(array('url' => '/save/remote', 'method' => 'POST', 'class' => 'form',  'enctype' => 'multipart/form-data')) !!}
      <form>
        <div class="form-group ">
          <label for="appliances">Appliances</label>
           {!! Form::select('appliance',
             $appliances,
             0,
             ['class' => 'form-control']
          ) !!}
        </div>
        <div class="form-group">
          <label for="switch">Switch:</label>
          {!! Form::radio('switch', '1', ['class' => 'radio-inline']) !!} On
          {!! Form::radio('switch', '0', ['class' => 'radio-inline']) !!} Off
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </form>
    {!! Form::close() !!}
</div>

<div id="Schedule" class="tabcontent">
    <table class = "table">
        <th>Appliance</th>
        <th>Date and Time</th>
        <th>Switch</th>
        <th>Action</th>
        @foreach($schedule as $key => $value)
        <tr>
            <td>{!!$schedule[$key]->name!!}</td>
            <td>{!!$schedule[$key]->when!!}</td>
            <td>
                @if($schedule[$key]->action == 1)
                    On
                @else
                    Off
                @endif
            </td>
            <td><a href="./delete/schedule/{!!$schedule[$key]->id!!}">delete</a></td>
        </tr>

        @endforeach
    </table>
</div>

@if (Session::has('success'))
    <div class = "alert alert-success" role = "alert">{!!Session::get('success')!!}</div>
@elseif (Session::has('error'))
    <div class = "alert alert-error" role = "alert"><div>{!!Session::get('error')!!}</div>
@endif

@stop