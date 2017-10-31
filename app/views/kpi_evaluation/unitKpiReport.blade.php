@extends('action.layouts.default')

@section('content')
<div class="col-lg-12">
<div class="x_panel">
     <div class="x_title">

        <div class="clearfix"></div>
            </div>
                  <div class="x_content" >
						<h2>M&E Report For All Zone Stations per KPI</h2>
							 <hr>
                        <form class="form-horizontal form-label-left" action="{{URL::to('kpiEvaluation/unitsKpireport')}}" method="post">
                        <div class="form-body pal" >
                            <div class="row">
							
                         <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						  <div class="col-xs-3 col-sm-3 col-md-3">
								<label>Financial Years</label>
								 <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">

								   <select name="year" class="form-control select2">
								    <option value="{{$f_year->id}}"> {{$f_year->year}}</option>
									@foreach($years as $year )
									<option  value="{{$year->id}}">{{$year->year}}</option>
									@endforeach
								   </select>
									{{ $errors->first('year', '<span class="help-block">:message</span>') }}
								 </div>
							  </div>
							  
							  @if( Auth::user()->hasRole('supermanager') )
							   <div class="col-xs-2 col-sm-2 col-md-2">
									<label>Zones</label>
								   <div class="form-group  {{{ $errors->has('zone') ? 'has-error' : '' }}}">
									 <select name="zone" class="form-control select2">
									 <option value="{{$zone->id}}"> {{$zone->zone_name}}</option>
									  @foreach($zones as $zone )
									  <option value="{{$zone->id}}">{{$zone->zone_name}}</option>
									  @endforeach
									 </select>
									  {{ $errors->first('zone', '<span class="help-block">:message</span>') }}
								   </div>
								</div>
								@endif
							  
							   <div class="col-xs-5 col-sm-5 col-md-5">
								<label>KPI</label>
								 <div class="form-group {{ $errors->has('kpi_id') ? 'has-error' : '' }}">

								   <select name="kpi_id" class="form-control select2">
								      <option disabled selected>Select Input</option>
								   	@foreach($objectives as $objective )
									<optgroup label="{{$objective->ob_code}} - {{$objective->ob_description}}">								  
										@foreach($objective->kpis as $kpi )
										<option value="{{$kpi->id}}">{{$kpi->code}} - {{$kpi->name}}</option>
										@endforeach
									</optgroup>
										@endforeach
								   </select>
									{{ $errors->first('kpi_id', '<span class="help-block">:message</span>') }}
								 </div>
							  </div>
								
                            
							 </div>
							 							
                            <div class="row">
                             <div class="col-md-12">
                            <div class="form-group pull-right">
                                    <button  type="submit"  class="btn btn-primary btn-sm"  ><i class="fa fa-search"></i> Search</button>
                                    </div>
                        </div>
                            </div>
                            <hr />
                        </div>
                        </form>
                                  </div>
								  
					@if( isset($allunits) && isset($KPIE))
						
                        <table class="table table-hover table-bordered dt jambo_table bulk_action " >
							<thead>

							<tr>
							<th>Station</th>
							
								@foreach($KPIE->fields as $field)
									
								<th>{{$field->field->label}}</th>
									
								@endforeach
							</tr>
							</thead>
							<tbody>
								
								<?php
								foreach($allunits as $unit){
										echo "<tr>";
								echo "<td>".$unit->name."</td>";
								 echo "<td  colspan='".(count($KPIE->fields))."'>";
								 echo "<table class='table table-hover  table-bordered'>";
								 echo "<tr>";
							
							
								foreach($KPIE->fields as $field){
									
								 echo "<th>".$field->field->label."</th>";
									
								}
								echo "</tr>";
								foreach(KpiEvaluation::getAll($KPIE->id,$unit->id,$f_year->id) as $result){
									
								echo "<tr>";																
									foreach($KPIE->fields as $field){
										
										echo "<td>".$result[$field->field->name]."</td>";
									}
										
									echo "</tr>";
							
								}
								echo "</table>";
								echo "</td>";
								echo "</tr>";
								}
								?>
								
							</tbody>
						</table>
						
					@endif
						  </div>
						  
						  
						  
						
						
</div>
				


               @stop
			   
	
