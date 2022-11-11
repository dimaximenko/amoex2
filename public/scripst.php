<?php

calculateCompleteTaskDatetime(4);
function calculateCompleteTaskDatetime(int $plusDays)
    {
        $dayComplete = date(strtotime('+'.$plusDays.' days'));
        $day_week = date( 'N', $dayComplete);//планируемый день недели

        if ($day_week > 5) {
            //если день выпадает на выходные, то ставим понедельник и получаем в unix
            $dayCompleteTemp = new DateTime(date( "Y-m-d", $dayComplete));
            $dayComplete = $dayCompleteTemp->modify('monday')->getTimestamp();
        }
        //прибавляем 18 часов (конец рабочего дня)
        $dayComplete = $dayComplete + (60 * 60 * 18);
        $dayComplete = strtotime(date("Y-m-d", $dayComplete));

        var_dump(date( "Y-m-d H:i:s", $dayComplete));

        return $dayComplete;

    }
