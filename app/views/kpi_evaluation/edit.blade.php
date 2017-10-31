@extends('action.layouts.default')

@section('content')
<div class="col-lg-12">
<div class="x_panel">
     <div class="x_title">

           <h2>KPI : <b>&nbsp; {{$kpi->name}}</b> </h2>
		    <a href="{{URL::to('kpiEvaluation/unitReport',$kpi->id)}}" class="btn btn-sm btn-warning pull-right"><i class="fa fa-file"></i> Reports</a>
        <a href="{{URL::to('kpiEvaluation/create',$kpi->id)}}" class="btn btn-sm btn-warning pull-right"><i class="fa fa-backward"></i></a>
		   
        <div class="clearfix"></div>
            </div>
                  <div class="x_content" >

                        <form class="form-horizontal form-label-left" action="{{URL::to('kpiEvaluation/update',$data->id)}}" method="post">
                        <div class="form-body pal" >
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                               <input type="hidden" name="kpi_id" value="{{{ $kpi->id }}}" />

                              <?php foreach ($kpi->fields as $key => $value): ?>
							  
							    <?php
								

								switch($value->field->data_type){
										case "enum": ?>
									<div class="row">
										 <div class="col-md-4">
											<label>{{$value->field->label}}</label><label class="pull-right label-warning"></label>
										</div>
										 <div class="col-md-4">
											<div class="form-group {{{ $errors->has($value->field->name) ? 'has-error' : '' }}}">
											 <select name="{{$value->field->name}}" class="form-control select2">
											  <option selected value="{{$data[$value->field->name]}}">{{$data[$value->field->name]}}</option>
											  @foreach(KpiEvaluation::getPossibleEnumValues($value->field->name) as $item)
													 @if(!in_array($item,$submitted_quarters))
																<option value="{{$item}}" id="{{$item}}">{{$item}}</option>
																
															@endif
											  @endforeach
											   </select>
											
											{{ $errors->first($value->field->name, '<span class="help-block">:message</span>') }}
											</div>
										</div>
									</div>
								<?php break; ?>
									<?php case "string": ?>
									   <div class="row">
										 <div class="col-md-4">
											<label>{{$value->field->label}}</label><label class="pull-right label-warning"></label>
										</div>
										 <div class="col-md-8">
											<div class="form-group {{{ $errors->has($value->field->name) ? 'has-error' : '' }}}">
											  <input class="form-control" type="text" name="{{$value->field->name}}"  value="{{$data[$value->field->name]}}">
											{{ $errors->first($value->field->name, '<span class="help-block">:message</span>') }}
											</div>
										</div>
								</div>
								<?php break; ?>
								
								<?php case "date": ?>
								 <div class="row">
										 <div class="col-md-4">
											<label>{{$value->field->label}}</label><label class="pull-right label-warning"></label>
											</div>
										 <div class="col-md-2">
											<div class="form-group {{{ $errors->has($value->field->name) ? 'has-error' : '' }}}">
											  <input type="text" value="{{$data[$value->field->name]}}"  class="form-control datepicker"  name="{{$value->field->name}}" >
											{{ $errors->first($value->field->name, '<span class="help-block">:message</span>') }}
											</div>
										</div>
										</div>
								<?php break; ?>
								
								<?php case "integer": ?>
								       <div class="row">
										 <div class="col-md-4">
											<label>{{$value->field->label}}</label><label class="pull-right label-warning"></label>
											</div>
										 <div class="col-md-2">
											<div class="form-group {{{ $errors->has($value->field->name) ? 'has-error' : '' }}}">
											  <input class="form-control" value="{{$data[$value->field->name]}}" type="text" name="{{$value->field->name}}">
											{{ $errors->first($value->field->name, '<span class="help-block">:message</span>') }}
											</div>
										</div>
								</div>
								<?php break; ?>
								
								<?php case "boolean": ?>
								 <div class="row">
										 <div class="col-md-4">
											<label>{{$value->field->label}}</label><label class="pull-right label-warning"></label>
											</div>
										 <div class="col-md-2">
											<div class="form-group {{{ $errors->has($value->field->name) ? 'has-error' : '' }}}">
											  <input type="checkbox" class="form-control"  name="{{$value->field->name}}" value="{{$data[$value->field->name]}}">
											{{ $errors->first($value->field->name, '<span class="help-block">:message</span>') }}
											</div>
										</div>
									</div>
								<?php break; ?>
								<?php case "double": ?>
								 <div class="row">
										 <div class="col-md-4">
											<label>{{$value->field->label}}</label><label class="pull-right label-warning"></label>
											</div>
										 <div class="col-md-2">
											<div class="form-group {{{ $errors->has($value->field->name) ? 'has-error' : '' }}}">
											  <input type="text" value="{{$data[$value->field->name]}}" class="form-control"  name="{{$value->field->name}}" >
											{{ $errors->first($value->field->name, '<span class="help-block">:message</span>') }}
											</div>
										</div>
										</div>
								<?php break; ?>
								
								<?php } ?>
														
                              <?php endforeach; ?>
                          
                            <div class="row">
                             <div class="col-md-12">
                            <div class="form-group pull-right">
                                    <button  type="submit"  class="btn btn-primary btn-sm"  ><i class="fa fa-save"></i> Update</button>
                                    </div>
                        </div>
                            </div>
                            <hr />
                        </div>
                        </form>
                                  </div>
								  
					
					
					

  </div>
</div>

                <!--END CONTENT-->
                </section>

               @stop
			   

