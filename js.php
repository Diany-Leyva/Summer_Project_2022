   
   <h1>This the tittle of the page</h1>
   
   <script type='text/javascript'>                                  //everything here will be js and not html
    
    function showHiddenText(elementToShow){ 

        element = document.getElementById(elementToShow);

        // collection = document.getElementsByClassName('hiddenText');     //Here we are getting a colection with all the eelemnt inside that class                   
        // element = collection[0];                                        //getting the first one
        
        if(element.classList.contains('showHiddenText')){
            element.classList.remove('showHiddenText');
        }

        else{
            element.classList.add('showHiddenText'); 
        } 
    }

    </script>

    <style>

        .hiddenText{
            display: none;
            background-color: gray;
            padding: 10px;
            opacity: 0;
            transition: opacity 2s;
           
        }

        .showHiddenText{
            display: block;
            opacity: 1;
            transition: opacity 2s;
        }


    </style>

    <p>Here is some text about something</p>
    <a href="#" onClick='showHiddenText("FaqQuestion1");'>Read the answer to question 1</a>         <!--We are hidden the text -->                   
    <p class= 'hiddenText' id='FaqQuestion1'>                                                        <!--We are hidden the text -->
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
    </p>   
    <br></br>
    
    <a href="#" onClick='showHiddenText("FaqQuestion2");'>Read the answer to question 2</a>         <!--We are hidden the text -->                   
    <p class= 'hiddenText' id='FaqQuestion2'>                                                        <!--We are hidden the text -->
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
        hjfdhjhfdkjh jfdhjkfdh jdfhjdhfj jhdfjhdf
    </p>

    <p>Here is some more text</p>