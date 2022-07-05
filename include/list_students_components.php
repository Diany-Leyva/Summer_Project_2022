<?php

// --------------------------------------------------------------------------

function echoSearchBar($heading){
    echo"
    <div class='flex-container-searchBarButtons'>
        <div>
            <h2>$heading</h2>
            <div class='flex-item-SearchBar search-bar'>          
            <input type='text' id='myInput' onkeyup='searchStudent()' placeholder='🔎 Search Name...' title='Type in a name'>
        </div> 
    </div>     
";    
}

// --------------------------------------------------------------------------

function echoAddStudentButton($buttonText){
    echo"
        <div class='flex-item-buttons'>              
            <button class='zoom' onclick=\"openAddStudentForm('')\">$buttonText</button>
        </div>
    </div>    
";    
}

// --------------------------------------------------------------------------

function echoStudentTable($students){
    echo"
    <div class='studentTable'>
        <table id='tableContainer'>
            <tr class='header'>               
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Lichess</th>
                <th>Credits</th>
                <th>Classes</th>
                <th>Next Class in</th> 
                <th>Delete</th>                  
            </tr>
"; 

    foreach($students as $student){ 
        $studentId = $student['StudentId'];                                                       
        echo"
        <tr> 
            <td><a href='student_profile.php?studentId=".$student['StudentId']."'>".$student['FirstName']." ".$student['LastName']."</a></td>    
            <td>".$student['Email']."</td>
            <td>".$student['Phone']."</td>
            <td>".$student['LichessUsername']."</td>   
            <td>".$student['Credits']."</td>   
            <td>".$student['Classes']."</td>";

            $daysToNextCLass = $student['DaysToNextClass']['Days']." days";
            
            if($student['DaysToNextClass']['Months'] != 0){
                $daysToNextCLass = $student['DaysToNextClass']['Months']." months and ".$student['DaysToNextClass']['Days']. " days";
            }
        echo"
            <td>$daysToNextCLass</td> 
            <td class=''><button class='deleteButton zoom' onclick='openDeleteStudent($studentId)'>🗑</button></td>     

        </tr>
";     
} 
echo"</table>
</div>
";
}  

// --------------------------------------------------------------------------
