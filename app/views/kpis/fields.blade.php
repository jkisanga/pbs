@extends('action.layouts.default')

@section('content')
<div class="col-lg-12">
<div class="x_panel">
     <div class="x_title">

           <h2>KPI : <b>&nbsp; {{$kpi->name}}</b> </h2>
        <a href="{{URL::to('kpis/index')}}" class="btn btn-sm btn-warning pull-right"><i class="fa fa-backward"></i></a>
        <div class="clearfix"></div>
            </div>
                  <div class="x_content" >

                        <form class="form-horizontal form-label-left" action="{{URL::to('kpis/fields',$kpi->id)}}" method="post">
                        <div class="form-body pal" >
                            <div class="row">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                               <input type="hidden" name="kpi_id" value="{{{ $kpi->id }}}" />

                                <div class="col-md-6">
                                  <label>Select Fields</label><label class="pull-right label-warning"></label>
                                    <div class="form-group {{{ $errors->has('fields') ? 'has-error' : '' }}}">
                                      <select class="form-control select2" multiple="multiple" name="fields[]">
                                         @foreach($fields as $field)
                                          <option value="{{$field->id}}">{{$field->label}}[{{$field->data_type}}]</option>
                                        @endforeach

                                      </select>
                                       {{ $errors->first('fields', '<span class="help-block">:message</span>') }}
                                    </div>
                                    </div>

                            </div>
                            <div class="row">
                             <div class="col-md-12">
                            <div class="form-group pull-right">
                                    <button  type="submit"  class="btn btn-primary btn-sm"  ><i class="fa fa-save"></i> Save</button>
                                    </div>
                        </div>
                            </div>
                            <hr />
                        </div>
                        </form>
                                  </div>

               <table class="table table-hover table-bordered  jambo_table bulk_action " >
                    <thead>
                       <tr>
                          <th>Field Name</th>
                           <th>Label</th>
                          <th >Data Type</th>
                          <th>Action</th>
                      </tr>
                </thead>
                <tbody>
                    <?php foreach ($kpi->fields as $key => $value): ?>
                      <tr>
                          <td>{{$value->field->name}}</td>
                          <td>{{$value->field->label}}</td>
                          <td>{{$value->field->data_type}}</td>
                          <td><a href="<?php echo URL::to('kpis/removeFld',$value->id)?>" class="btn btn-danger" onclick="return confirm('are you sure?')"> <i class="fa fa-remove"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
  </div>
</div>

                <!--END CONTENT-->
                </section>

               @stop
