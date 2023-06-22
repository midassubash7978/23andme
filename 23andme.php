<?php
ini_set ("memory_limit","-1");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23andme";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$html = file_get_contents("copy-4.json");//test3.json//file3
//echo $html;
$manage_ar = json_decode($html, true);
//echo "<pre>"."subash";print_r($manage_ar);exit;
$failed_array = [];//lighthouse
if(!empty($manage_ar)){
    foreach($manage_ar as $kay=>$array){
        $surname = (empty($array['surname'])) ? '' : $array['surname'];
        $content_array = $array;
        // $pctpai = $census = (isset($content_array['census'])) ? $content_array['census'] : '';
        // if(!empty($census)){
        //     $census_js = json_encode($census, JSON_FORCE_OBJECT);
        //     $pctpai = (isset($census["PCTAPI"])) ? $census["PCTAPI"] : '';
        //     $pctblack = (isset($census["PCTBLACK"])) ? $census["PCTBLACK"] : '';
        //     $pctain = (isset($census["PCTAIAN"])) ? $census["PCTAIAN"] : '';
        //     $pctwhite = (isset($census["PCTWHITE"])) ? $census["PCTWHITE"] : '';
        //     $count = (isset($census["COUNT"])) ? $census["COUNT"] : '';
        //     $pct2pr = (isset($census["PCT2PRACE"])) ? $census["PCT2PRACE"] : '';
        //     $pctsp = (isset($census["PCTHISPANIC"])) ? $census["PCTHISPANIC"] : '';
        //     $name = (isset($census["NAME"])) ? $census["NAME"] : '';
        // }
        // $no_smell = (isset($content_array['asparagus_metabolite_detection']['no_smell'])) ? '' : $content_array['asparagus_metabolite_detection']['no_smell'];
        // $smell = (isset($content_array['asparagus_metabolite_detection']['smell'])) ? '' : $content_array['asparagus_metabolite_detection']['smell'];
        // $low_consumption = (isset($content_array['caffeine_consumption_wellness2']['low_consumption'])) ? '' : $content_array['caffeine_consumption_wellness2']['low_consumption'];
        // $less_consumption = (isset($content_array['caffeine_consumption_wellness2']['less_consumption'])) ? '' : $content_array['caffeine_consumption_wellness2']['less_consumption'];
        // $slightly_more_consumption = (isset($content_array['caffeine_consumption_wellness2']['slightly_more_consumption'])) ? '' : $content_array['caffeine_consumption_wellness2']['slightly_more_consumption'];
        // $more_consumption = (isset($content_array['caffeine_consumption_wellness2']['more_consumption'])) ? '' : $content_array['caffeine_consumption_wellness2']['more_consumption'];
        // $most_consumption = (isset($content_array['caffeine_consumption_wellness2']['most_consumption'])) ? '' : $content_array['asparagus_metabolite_detection']['most_consumption'];
        // $likely_intolerant = (isset($content_array['lactose_wellness2']['likely_intolerant'])) ? '' : $content_array['lactose_wellness2']['likely_intolerant'];
        // $likely_tolerant = (isset($content_array['lactose_wellness2']['likely_tolerant'])) ? '' : $content_array['lactose_wellness2']['likely_tolerant'];
        // $taster = (isset($content_array['bitter_taste']['taster'])) ? '' : $content_array['bitter_taste']['taster'];
        // $non_taster = (isset($content_array['bitter_taste']['non_taster'])) ? '' : $content_array['bitter_taste']['non_taster'];
        // $likely_to_flush = (isset($content_array['alcohol_flush_reaction_wellness2']['likely_to_flush'])) ? '' : $content_array['alcohol_flush_reaction_wellness2']['likely_to_flush'];
        // $unlikely_to_flush = (isset($content_array['alcohol_flush_reaction_wellness2']['unlikely_to_flush'])) ? '' : $content_array['alcohol_flush_reaction_wellness2']['unlikely_to_flush'];
        // $nonfunctional_actn3 = (isset($content_array['muscle_composition_wellness2']['nonfunctional_actn3'])) ? '' : $content_array['muscle_composition_wellness2']['nonfunctional_actn3'];
        // $functional_actn3 = (isset($content_array['muscle_composition_wellness2']['functional_actn3'])) ? '' : $content_array['muscle_composition_wellness2']['functional_actn3'];
        // $no_red = (isset($content_array['red_hair']['no_red'])) ? '' : $content_array['red_hair']['no_red'];
        // $red = (isset($content_array['red_hair']['red'])) ? '' : $content_array['red_hair']['red'];
        // $greater_sleep_intensity_two_variants = (isset($content_array['sleep_movement_wellness2']['greater_sleep_intensity_two_variants'])) ? '' : $content_array['sleep_movement_wellness2']['greater_sleep_intensity_two_variants'];
        // $greater_sleep_intensity_one_variant = (isset($content_array['sleep_movement_wellness2']['greater_sleep_intensity_one_variant'])) ? '' : $content_array['sleep_movement_wellness2']['greater_sleep_intensity_one_variant'];
        // $fewer_limb_movements = (isset($content_array['sleep_movement_wellness2']['fewer_limb_movements'])) ? '' : $content_array['sleep_movement_wellness2']['fewer_limb_movements'];
        // $dry = (isset($content_array['earwax_type']['dry'])) ? '' : $content_array['earwax_type']['dry'];
        // $wet = (isset($content_array['earwax_type']['wet'])) ? '' : $content_array['earwax_type']['wet'];
        // $bmi_difference = (isset($content_array['saturated_fat_and_weight_wellness2']['bmi_difference'])) ? '' : $content_array['saturated_fat_and_weight_wellness2']['bmi_difference'];
        // $no_bmi_difference = (isset($content_array['saturated_fat_and_weight_wellness2']['no_bmi_difference'])) ? '' : $content_array['saturated_fat_and_weight_wellness2']['no_bmi_difference'];
        // $blue = (isset($content_array['eye_color']['blue'])) ? '' : $content_array['eye_color']['blue'];
        // $dark_brown = (isset($content_array['eye_color']['dark_brown'])) ? '' : $content_array['eye_color']['dark_brown'];
        // $dark_hazel = (isset($content_array['eye_color']['dark_hazel'])) ? '' : $content_array['eye_color']['dark_hazel'];
        // $green = (isset($content_array['eye_color']['green'])) ? '' : $content_array['eye_color']['green'];
        // $greenish_blue = (isset($content_array['eye_color']['greenish_blue'])) ? '' : $content_array['eye_color']['greenish_blue'];
        // $light_brown = (isset($content_array['eye_color']['light_brown'])) ? '' : $content_array['eye_color']['light_brown'];
        // $light_hazel = (isset($content_array['eye_color']['light_hazel'])) ? '' : $content_array['eye_color']['light_hazel'];
        // $greater_sleep_intensity = (isset($content_array['deep_sleep_wellness2']['greater_sleep_intensity'])) ? '' : $content_array['deep_sleep_wellness2']['greater_sleep_intensity'];
        // $typical_sleep_intensity = (isset($content_array['deep_sleep_wellness2']['typical_sleep_intensity'])) ? '' : $content_array['deep_sleep_wellness2']['typical_sleep_intensity'];
        // $dark_brown = (isset($content_array['skin_color']['dark_brown'])) ? '' : $content_array['skin_color']['dark_brown'];
        // $light_beige = (isset($content_array['skin_color']['light_beige'])) ? '' : $content_array['skin_color']['light_beige'];
        // $light_brown = (isset($content_array['skin_color']['light_brown'])) ? '' : $content_array['skin_color']['light_brown'];
        // $moderately_fair = (isset($content_array['skin_color']['moderately_fair'])) ? '' : $content_array['skin_color']['moderately_fair'];
        // $olive = (isset($content_array['skin_color']['olive'])) ? '' : $content_array['skin_color']['olive'];
        // $very_fair = (isset($content_array['skin_color']['very_fair'])) ? '' : $content_array['skin_color']['very_fair'];
        // $typical_likelihood = (isset($content_array['preeclampsia_ever_pregnant']['typical_likelihood'])) ? '' : $content_array['preeclampsia_ever_pregnant']['typical_likelihood'];
        // $increased_likelihood = (isset($content_array['preeclampsia_ever_pregnant']['increased_likelihood'])) ? '' : $content_array['preeclampsia_ever_pregnant']['increased_likelihood'];
        // $typical_likelihood = (isset($content_array['bcc_scc']['typical_likelihood'])) ? '' : $content_array['bcc_scc']['typical_likelihood'];
        // $increased_likelihood = (isset($content_array['bcc_scc']['increased_likelihood'])) ? '' : $content_array['bcc_scc']['increased_likelihood'];
        // $m_typical_likelihood = (isset($content_array['melanoma']['typical_likelihood'])) ? '' : $content_array['melanoma']['typical_likelihood'];
        // $m_increased_likelihood = (isset($content_array['melanoma']['increased_likelihood'])) ? '' : $content_array['melanoma']['increased_likelihood'];
        // $h__typical_likelihood = (isset($content_array['hashimotos']['typical_likelihood'])) ? '' : $content_array['hashimotos']['typical_likelihood'];
        // $h_increased_likelihood = (isset($content_array['hashimotos']['increased_likelihood'])) ? '' : $content_array['hashimotos']['increased_likelihood'];
        // $d__typical_likelihood = (isset($content_array['dog_allergy_broad_controls']['typical_likelihood'])) ? '' : $content_array['dog_allergy_broad_controls']['typical_likelihood'];
        // $d_increased_likelihood = (isset($content_array['dog_allergy_broad_controls']['increased_likelihood'])) ? '' : $content_array['dog_allergy_broad_controls']['increased_likelihood'];
        // $n__typical_likelihood = (isset($content_array['nearsightedness_broad_controls']['typical_likelihood'])) ? '' : $content_array['nearsightedness_broad_controls']['typical_likelihood'];
        // $n_increased_likelihood = (isset($content_array['nearsightedness_broad_controls']['increased_likelihood'])) ? '' : $content_array['nearsightedness_broad_controls']['increased_likelihood'];
        // $high_ldl__typical_likelihood = (isset($content_array['high_ldl_broad']['typical_likelihood'])) ? '' : $content_array['high_ldl_broad']['typical_likelihood'];
        // $high_ldl_increased_likelihood = (isset($content_array['high_ldl_broad']['increased_likelihood'])) ? '' : $content_array['high_ldl_broad']['increased_likelihood'];
        // $fibromyalgia__typical_likelihood = (isset($content_array['fibromyalgia']['typical_likelihood'])) ? '' : $content_array['fibromyalgia']['typical_likelihood'];
        // $fibromyalgia_increased_likelihood = (isset($content_array['fibromyalgia']['increased_likelihood'])) ? '' : $content_array['fibromyalgia']['increased_likelihood'];
        // $cad_product_typical_likelihood = (isset($content_array['cad_product']['typical_likelihood'])) ? '' : $content_array['cad_product']['typical_likelihood'];
        // $cad_product_increased_likelihood = (isset($content_array['cad_product']['increased_likelihood'])) ? '' : $content_array['cad_product']['increased_likelihood'];
        // $ibs_not_ibd_typical_likelihood = (isset($content_array['ibs_not_ibd']['typical_likelihood'])) ? '' : $content_array['ibs_not_ibd']['typical_likelihood'];
        // $ibs_not_ibd_increased_likelihood = (isset($content_array['ibs_not_ibd']['increased_likelihood'])) ? '' : $content_array['ibs_not_ibd']['increased_likelihood'];
        // $eczema_ibd_typical_likelihood = (isset($content_array['eczema']['typical_likelihood'])) ? '' : $content_array['eczema']['typical_likelihood'];
        // $eczema_ibd_increased_likelihood = (isset($content_array['eczema']['increased_likelihood'])) ? '' : $content_array['eczema']['increased_likelihood'];
        // $iqb_low_hdl_typical_likelihood = (isset($content_array['iqb_low_hdl']['typical_likelihood'])) ? '' : $content_array['iqb_low_hdl']['typical_likelihood'];
        // $iqb_low_hdl_increased_likelihood = (isset($content_array['iqb_low_hdl']['increased_likelihood'])) ? '' : $content_array['iqb_low_hdl']['increased_likelihood'];
        // $glaucoma_strict_typical_likelihood = (isset($content_array['glaucoma_strict']['typical_likelihood'])) ? '' : $content_array['glaucoma_strict']['typical_likelihood'];
        // $glaucoma_strict_increased_likelihood = (isset($content_array['glaucoma_strict']['increased_likelihood'])) ? '' : $content_array['glaucoma_strict']['increased_likelihood'];
        // $anxiety_typical_likelihood = (isset($content_array['anxiety']['typical_likelihood'])) ? '' : $content_array['anxiety']['typical_likelihood'];
        // $anxiety_increased_likelihood = (isset($content_array['anxiety']['increased_likelihood'])) ? '' : $content_array['anxiety']['increased_likelihood'];
        // $anxiety_typical_likelihood = (isset($content_array['anxiety']['typical_likelihood'])) ? '' : $content_array['anxiety']['typical_likelihood'];
        // $anxiety_increased_likelihood = (isset($content_array['anxiety']['increased_likelihood'])) ? '' : $content_array['anxiety']['increased_likelihood'];
        // $restless_leg_syndrome_typical_likelihood = (isset($content_array['restless_leg_syndrome']['typical_likelihood'])) ? '' : $content_array['restless_leg_syndrome']['typical_likelihood'];
        // $restless_leg_syndrome_increased_likelihood = (isset($content_array['restless_leg_syndrome']['increased_likelihood'])) ? '' : $content_array['restless_leg_syndrome']['increased_likelihood'];
        // $fatty_liver_non_alcoholic_typical_likelihood = (isset($content_array['fatty_liver_non_alcoholic']['typical_likelihood'])) ? '' : $content_array['fatty_liver_non_alcoholic']['typical_likelihood'];
        // $fatty_liver_non_alcoholic_increased_likelihood = (isset($content_array['fatty_liver_non_alcoholic']['increased_likelihood'])) ? '' : $content_array['fatty_liver_non_alcoholic']['increased_likelihood'];
        // $atrial_fibrillation_typical_likelihood = (isset($content_array['atrial_fibrillation']['typical_likelihood'])) ? '' : $content_array['atrial_fibrillation']['typical_likelihood'];
        // $atrial_fibrillation_increased_likelihood = (isset($content_array['atrial_fibrillation']['increased_likelihood'])) ? '' : $content_array['atrial_fibrillation']['increased_likelihood'];
        // $uterine_fibroids_product_asof_2015_typical_likelihood = (isset($content_array['uterine_fibroids_product_asof_2015']['typical_likelihood'])) ? '' : $content_array['uterine_fibroids_product_asof_2015']['typical_likelihood'];
        // $uterine_fibroids_product_asof_2015_increased_likelihood = (isset($content_array['uterine_fibroids_product_asof_2015']['increased_likelihood'])) ? '' : $content_array['uterine_fibroids_product_asof_2015']['increased_likelihood'];
        // $sleep_apnea_typical_likelihood = (isset($content_array['sleep_apnea']['typical_likelihood'])) ? '' : $content_array['sleep_apnea']['typical_likelihood'];
        // $sleep_apnea_increased_likelihood = (isset($content_array['sleep_apnea']['increased_likelihood'])) ? '' : $content_array['sleep_apnea']['increased_likelihood'];
        // $HIP_acne_typical_likelihood = (isset($content_array['HIP_acne']['typical_likelihood'])) ? '' : $content_array['HIP_acne']['typical_likelihood'];
        // $HIP_acne_increased_likelihood = (isset($content_array['HIP_acne']['increased_likelihood'])) ? '' : $content_array['HIP_acne']['increased_likelihood'];
        // $gest_diabetes_typical_likelihood = (isset($content_array['gest_diabetes_no_early_onset']['typical_likelihood'])) ? '' : $content_array['gest_diabetes_no_early_onset']['typical_likelihood'];
        // $gest_diabetes_increased_likelihood = (isset($content_array['gest_diabetes_no_early_onset']['increased_likelihood'])) ? '' : $content_array['gest_diabetes_no_early_onset']['increased_likelihood'];
        // $high_tg_150_typical_likelihood = (isset($content_array['high_tg_150_no_med_controls']['typical_likelihood'])) ? '' : $content_array['high_tg_150_no_med_controls']['typical_likelihood'];
        // $high_tg_150_increased_likelihood = (isset($content_array['high_tg_150_no_med_controls']['increased_likelihood'])) ? '' : $content_array['high_tg_150_no_med_controls']['increased_likelihood'];
        // $kidney_stones_typical_likelihood = (isset($content_array['kidney_stones_diagnosis']['typical_likelihood'])) ? '' : $content_array['kidney_stones_diagnosis']['typical_likelihood'];
        // $kidney_stones_increased_likelihood = (isset($content_array['kidney_stones_diagnosis']['increased_likelihood'])) ? '' : $content_array['kidney_stones_diagnosis']['increased_likelihood'];
        // $HIP_diverticulitis_typical_likelihood = (isset($content_array['HIP_diverticulitis']['typical_likelihood'])) ? '' : $content_array['HIP_diverticulitis']['typical_likelihood'];
        // $HIP_diverticulitis_increased_likelihood = (isset($content_array['HIP_diverticulitis']['increased_likelihood'])) ? '' : $content_array['HIP_diverticulitis']['increased_likelihood'];
        // $gout_diagnosis_typical_likelihood = (isset($content_array['gout_diagnosis']['typical_likelihood'])) ? '' : $content_array['gout_diagnosis']['typical_likelihood'];
        // $gout_diagnosis_increased_likelihood = (isset($content_array['gout_diagnosis']['increased_likelihood'])) ? '' : $content_array['gout_diagnosis']['increased_likelihood'];
        // $gout_diagnosis_typical_likelihood = (isset($content_array['cat_allergy_broad_controls']['typical_likelihood'])) ? '' : $content_array['cat_allergy_broad_controls']['typical_likelihood'];
        // $gout_diagnosis_increased_likelihood = (isset($content_array['cat_allergy_broad_controls']['increased_likelihood'])) ? '' : $content_array['cat_allergy_broad_controls']['increased_likelihood'];
        // echo "<pre>";print_r($content_array);exit;
        $json_content = json_encode($content_array, JSON_FORCE_OBJECT);
        $characters = ["'", "!"];
        $newString = str_replace($characters, " ", $surname);
        $newString2 = str_replace($characters, " ", $json_content);
       // $query = "INSERT INTO `surnames_file04`(`surname`, `content`) VALUES ('$newString','$newString2')";
        //$failed_array[] = $query;
        $conn->query($query);
        // if ($conn->query($query) === TRUE) {
            
        // } else {
        //     echo $query . "<br>" . $conn->error;exit;
        // }
    }
}else{
    echo "Array is Empty";exit;
}
if(!empty($failed_array)){
    echo "<pre>";print_r($failed_array);exit;
}
//echo "<pre>";print_r($manage);exit;
////Allowed memory size of 209715200 bytes exhausted (tried to allocate 40960 bytes) apache
?>
