<?php include('top.php');

//now print out each record
    $query = 'SELECT fldDepartment FROM tblCourses WHERE fldCourseNAme LIKE ?';
    $data = array('%Introduction')
    $info2 = $thisDatabaseReader->select($query, "", 1, 0, 0, 1);


    $highlight = 1; // used to highlight alternate rows
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < 1; $i++) {
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
