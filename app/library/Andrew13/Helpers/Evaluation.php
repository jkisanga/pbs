<?php
namespace Andrew13\Helpers;
class Evaluation{
	
	public static function getAll($kpi_id,$unit_id,$year_id)
    {
			$kpi = Kpi::find($kpi_id);
			$results = KpiEvaluation::getKpiEvaluation($kpi_id,$unit_id,$year_id);
	
						
			$fields = $kpi->fields;
			$fieldNames = [];
			$fieldsToSum = [];
			for($i = 0; $i < count($fields); $i++){
				$fieldNames[$i] = $fields[$i]->field->name; //get all table  fields 
				if($fields[$i]->field->data_type == 'integer'){
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

?>