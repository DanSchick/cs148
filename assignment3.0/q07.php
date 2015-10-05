<?php include('top.php');



//now print out each record
    print '<p>Displaying Query.....<br>SELECT COUNT(DISTINCT fldDepartment) FROM tblCourses;</p>';
    $query = 'SELECT COUNT(DISTINCT fldDepartment) FROM tblCourses';
    $info2 = $thisDatabaseReader->select($query, "", 0, 0, 0, 0, false, false);


    $highlight = 1; // used to highlight alternate rows
    $columns = 1;
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
