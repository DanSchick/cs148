<?php include('top.php');

//now print out each record
    print '<p>Displaying Query....<br>SSELECT DISTINCT tblCourses.fldCourseName FROM tblCourses INNER JOIN tblEnrolls ON tblEnrolls.fnkCourseId = tblCourses.pmkCourseId WHERE fldGrade = 100;<br><br><br></p>';
    $query = 'SELECT DISTINCT tblCourses.fldCourseName FROM tblCourses INNER JOIN tblEnrolls ON tblEnrolls.fnkCourseId = tblCourses.pmkCourseId WHERE fldGrade = ?';
    $data = array(100);
    $info2 = $thisDatabaseReader->select($query, $data, 1, 0, 0);

    $highlight = 1; // used to highlight alternate rows
    print '<table>';
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
