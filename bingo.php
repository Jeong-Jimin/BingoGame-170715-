<!--


① html페이지로 틀 만들기 (80포트번호 검사)
② php로 넘어오게 하기 및 변수 받기 (form 및 $_GET['value'])
③ 범위 체크 (가로*세로범위 < 입력한 범위) , 아니라면 오류메시지 출력하기(및 되돌아오기)
④  중복없는 난수 생성 및 이차원 배열안에 가로 * 세로 수만큼 table 생성(가로*세로 X, 입력한 범위까지)
⑤ 3의 배수 check 되어있으면 color 처리하기
⑥ return .html Page

-->

<script>

    function returnpage() {
        window.location.assign("bingo.html");

    }

</script>

<style>
    table {
        width: 100px;
        text-align: center;

    }

    td {
        height: 50px;
        text-align: center;
    }

    body{
        background-color: lavenderblush;
    }

</style>

<?php
echo "<body>";
$width = $_GET['width'];
$height = $_GET['heigth'];

$RealRange = $width * $height; //--- Result Of width * height

$range1 = $_GET['range1'];
$range2 = $_GET['range2'];

$inputRange = $range2 - $range1 + 1; //--- the Number Of inputRange from Keyboard

$ColorCheck = $_GET['color'];

if ($inputRange < $RealRange) { //--- X, Do not Proceed the next Step(Code)

    echo "범위를 더 크게 설정하십시오";


}

$RangeArray = array();

for ($i = 0; $i < $inputRange; $i++) {
    $RangeArray[$i] = rand($range1, $range2);

    for ($j = 0; $j < $i; $j++) {
        if ($RangeArray[$i] == $RangeArray[$j]) {
            $RangeArray[$i--]; //---remove

            break;
        }
    }
}

$TableMaker[][] = NULL;

$count = 0;
for ($i = 0; $i < $height; $i++) {
    for ($j = 0; $j < $width; $j++) {

        $TableMaker[$i][$j] = $RangeArray[$count];
        ++$count;
    }
}


//---Proceed the next Step(Code) => create the Table At JavaScript scope

//---Make Table  //---Input Value(maked Random Value in RangeArray) in Table

if ($ColorCheck == 'on') {
    echo "<table border='1'  bgcolor='#ffe4e1' align='center'>";
    for ($i = 0; $i < $height; $i++) {//tr
        echo "<tr>";
        for ($j = 0; $j < $width; $j++) {//td
            $randomvalue = $TableMaker[$i][$j];

            if ($randomvalue % 3 == 0) {
                echo "<td style='background-color: aquamarine'>$randomvalue</td>";
            } else {
                echo "<td> $randomvalue </td>";
            }
        }
        echo "</tr>";
    }
}

else {
    echo "<table border='1' bgcolor='#ffe4e1' align='center'>";
    for ($i = 0; $i < $height; $i++) {//tr
        echo "<tr>";
        for ($j = 0; $j < $width; $j++) {//td
            $randomvalue = $TableMaker[$i][$j];

                echo "<td> $randomvalue </td>";

        }
        echo "</tr>";
    }
}

echo "<input type='button' value='돌아가기٩̋(ˊᵒ̴̤ꇴ ᵒ̴̤ˋ)' onclick='returnpage()'>";

echo "</html>";
?>