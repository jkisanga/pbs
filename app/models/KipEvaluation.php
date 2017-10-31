<?php

class KpiEvaluation extends \Eloquent {


protected $guarded  = array('id','_token');


public static function getPossibleEnumValues($name){
    $enumStr = DB::select( DB::raw('SHOW COLUMNS FROM kpi_evaluations WHERE Field = "'.$name.'"'))[0]->Type;
	
	preg_match('/^enum\((.*)\)$/', $enumStr, $matches);
	   foreach( explode(',', $matches[1]) as $value )
	   {
		   $enum[] = trim( $value, "'" );   
	   }
   return $enum;

}

public static function getKpiEvaluation($kpi_id,$unit_id,$year_id){
	
	return KpiEvaluation::where("kpi_id","=",$kpi_id)
						->where("unit_id","=",$unit_id)
						->where("year_id","=",$year_id)
						;
}


public static function getZoneKpiEvaluation($kpi_id,$zone_id,$year_id){
	
	return KpiEvaluation::where("kpi_id","=",$kpi_id)
						->where("zone_id","=",$zone_id)
						->where("year_id","=",$year_id)
						;
}

public static function getOverallKpiEvaluation($kpi_id,$year_id){
	
	return KpiEvaluation::where("kpi_id","=",$kpi_id)
						->where("year_id","=",$year_id)
						;
}

public static function getAll($kpi_id,$unit_id,$year_id)
    {
			$kpi = Kpi::find($kpi_id);
			$results = KpiEvaluation::where("kpi_id","=",$kpi_id)
						->where("unit_id","=",$unit_id)
						->where("year_id","=",$year_id)
						;
							
			$fields = $kpi->fields;
			$fieldNames = [];
			$fieldsToSum = [];
			for($i = 0; $i < count($fields); $i++){
				$fieldNames[$i] = $fields[$i]->field->name; //get all table  fields 
				if($fields[$i]->field->data_type == 'integer' || $fields[$i]->field->data_type == 'double'){
						$fieldsToSum[$i] = DB::raw('sum('.$fields[$i]->field->name.') as '.$fields[$i]->field->name);
				}			
			}	
			
		//check if field is dropdown, and group the results by dropdown fields	
			foreach($fields as $field){
						if($field->field->data_type == 'enum'){	
							if(count($fieldsToSum) > 0){
								$results = $results->select('*',DB::raw(implode(',',$fieldsToSum)))->groupBy($field->field->name);
							}else{
								$results = $results->select('*')->groupBy($field->field->name);
							}								
						}
					}
		
			
			
		$results = $results->get();
        return $results;
    }
}
