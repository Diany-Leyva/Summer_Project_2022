<?php
// ********************************************************************************************************************************
//I used an emoji for search bar icon lol. Is this ok? 
// ********************************************************************************************************************************

function echoSearchBar($heading){
    echo"
    <div class='flex-container-searchBarButtons'>
        <div>
            <h2 class='searchBar'>$heading</h2>
            <div class='flex-item-SearchBar search-bar'>          
            <input type='text' id='myInput' onkeyup='searchStudent()' placeholder='🔎 Search Name...' title='Type in a name'>
        </div> 
    </div>     
";    
}

// ********************************************************************************************************************************

function echoAddStudentButton($buttonText){
    echo"
                    
            <button class='addStudentButton position' onclick=\"openStudentForm('')\">$buttonText</button>
       
    </div>    
";    
}

// ********************************************************************************************************************************

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
        $studentId = htmlspecialchars($student['StudentId']); 
        
        //I want to show username only
        $lichessLink = htmlspecialchars($student['LichessLink']);      
        $lichessUsername = substr($lichessLink,22);
        
        echo"
        <tr> 
            <td><a href='student_profile.php?studentId=".htmlspecialchars($student['StudentId'])."'>".htmlspecialchars($student['FirstName'])." ".htmlspecialchars($student['LastName'])."</a></td>    
            <td>".htmlspecialchars($student['Email'])."</td>
            <td>".htmlspecialchars($student['Phone'])."</td>
            <td>$lichessUsername</td>   
            <td>".htmlspecialchars($student['Credits'])."</td>   
            <td>".htmlspecialchars($student['Classes'])."</td>";

            $daysToNextCLass = htmlspecialchars($student['DaysToNextClass']['Days'])." days";
            
            if($student['DaysToNextClass']['Months'] != 0){
                $daysToNextCLass = htmlspecialchars($student['DaysToNextClass']['Months'])." months and ".htmlspecialchars($student['DaysToNextClass']['Days']). " days";
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

// ********************************************************************************************************************************
