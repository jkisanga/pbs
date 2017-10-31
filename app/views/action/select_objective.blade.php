@extends('action.layouts.default')

@section('content')
                <!--BEGIN CONTENT-->
<div class="page-content">
<div id="tab-general">
<div class="row mbl">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                Add Target Wizard
                </div>
            <div class="panel-body pan">
                <form action="{{URL::to('get_selected_objective')}}" method="post">
                <div class="form-body pal">
                 <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                     <label for="inputName" class="control-label">
                      <b>Select Objective</b> </label>
                        <div class="input-icon right">
                        <select name="objective_id" class="form-control">
                        <option></option>
                         @foreach($objectives as $objective)
                        <option value="{{$objective->id}}"> {{$objective->ob_code}} : {{$objective->ob_description}}</option>
                        @endforeach
                        </select>
                       <!-- {{ Form::select('objective_id', Objective::lists('ob_description', 'id'), array('class' => 'form-control')) }} -->
                            </div>
                    </div>
                    {{ $errors->first('ob_code', '<span class="help-inline" style="color:red">:message</span>') }}
                </div>
            <div class="col-md-6">
              <div class="form-group pull-right">
                      <input  type="submit"  class="btn btn-primary" value="Next" /></div>
            </div>
                                                    <hr />
                                                </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--END CONTENT-->
               @stop