<?php include('top.php');



//now print out each record
    print '<p>Displaying Query.....<br>SELECT fldFirstName, CONCAT(fldPhone, "  ", fldSalary) FROM tblTeachers WHERE fldSalary<(SELECT AVG(fldSalary) FROM tblTeachers);</p>';
    $query = 'SELECT fldFirstName, CONCAT(fldPhone, "  ", fldSalary) FROM tblTeachers WHERE fldSalary<(SELECT AVG(fldSalary) FROM tblTeachers)';
    $info2 = $thisDatabaseReader->select($query, $data, 1, 0, 2, 1, false, false);
    print '<p><br><br><br>SCROLL DOWN</p>';


    $highlight = 1; // used to highlight alternate rows
    $columns = 2;
    print '<table>';
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
            print '<br>';
        }
        print '</tr>';
    }

    // all done
    print '</table>';
    print '</aside>';


print '</article>';
include "footer.php";
?>
