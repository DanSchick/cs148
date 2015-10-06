<?php include('top.php');



//now print out each record
    print '<p>Displaying Query.....<br>SELECT tblSections.fldCRN, fldFirstName, fldLastName FROM tblStudents
INNER JOIN tblEnrolls ON tblEnrolls.fnkStudentId = tblStudents.pmkStudentId
INNER JOIN tblSections ON tblEnrolls.fnkCourseId = tblSections.fnkCourseId
WHERE tblSections.fnkCourseId = 392 GROUP BY fldLastName DESC;</p>';
    print '<p><br><br><br> SCROLL DOWN </p>';
    $query = 'SELECT tblSections.fldCRN, fldFirstName, fldLastName FROM tblStudents INNER JOIN tblEnrolls ON tblEnrolls.fnkStudentId = tblStudents.pmkStudentId INNER JOIN tblSections ON tblEnrolls.fnkCourseId = tblSections.fnkCourseId WHERE tblSections.fnkCourseId = ? GROUP BY fldLastName DESC';
    $data = array('392');
    $info2 = $thisDatabaseReader->select($query, $data, 1, 0, 0, 0, false, false);


    $highlight = 1; // used to highlight alternate rows
    $columns = 3;
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
