@extends('action.layouts.default')

@section('content')
<div class="col-lg-12">
<div class="x_panel">
     <div class="x_title">
           <h2>
        <a href="{{URL::to('kpis/index')}}" class="btn btn-sm btn-warning pull-right"><i class="fa fa-backward"></i></a>
        <div class="clearfix"></div>
            </div>
                            <div class="x_content">

                                                <form action="{{URL::to('kpis/update',$kpi->id)}}" method="post">
                                                <div class="form-body pal">
                                                    <div class="row">
                                                       <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                                      
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>KPI Code</label>
                                                                <div class="input-icon">
																<input  type="text"  name="code" value="{{$kpi->code}}" class="form-control" required="true" /></div>
                                                                </div>
                                                            </div>

                                                         <div class="col-md-8">
                                                            <div class="form-group">
                                                            <label>Indicator Name</label>
                                                                <div class="input-icon">
                                                                    <input  type="text"  name="name" value="{{$kpi->name}}" class="form-control" required="true" /></div>
                                                            </div>
                                                        </div>
                                                          <div class="col-md-2">
                                                            <div class="form-group">
                                                            <label>Strategic Plan</label>
                                                                <div class="input-icon">
                                                                    <input  type="text"  name="strategic_plan" value="{{$kpi->strategic_plan}}" class="form-control" required="true" /></div>
                                                            </div>
                                                        </div>

                                                    </div>
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
                               
                    </div>
                <!--END CONTENT-->
                </section>

               @stop