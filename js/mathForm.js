// Value Input ~ Height / Side / Base / Radius 
var shape;
var valueInput1;
var valueInput2;
var valueInput3;
var calcButton;
var area_errorTag;


function reset()
{
    console.log('resetting')
    valueInput1.style.visibility = 'hidden'
    valueInput2.style.visibility = 'hidden'
    valueInput3.style.visibility = 'hidden'

    valueInput1.value = ''
    valueInput2.value = ''
    valueInput3.value = ''

    calcButton.style.visibility = 'hidden'

    let area_errorTag = document.getElementById('areaORerror-display')
    // area_errorTag.visibility = 'hidden'
    area_errorTag.innerHTML = ''
}

// START
function clicked() 
{
    valueInput1 = document.getElementById('input-1');
    valueInput2 = document.getElementById('input-2');
    valueInput3 = document.getElementById('input-3');
    calcButton = document.getElementById('calculate-button')

    // 1) Reset Form
    reset()
    console.log('form was reset in clicked')
    
    // 2) Grab Selected Shape
    const select = document.getElementById('shape-selector')
    shape = select.options[select.selectedIndex].value

    // 3) Display shape + area
    valuePrompt()

    // 4) Prompt for shape values
    formatValueInput()
}

// Get Values for Correct Shape
function valuePrompt()
{
    let shapeTitle = document.getElementById('shape-title')

    // Display chosen shape name & Value prompt 
    switch(shape)
    {
        case 'select':
          shapeTitle.innerHTML = 'Please select a shape value'
            reset()
            break;
        case 'right':
            shapeTitle.innerHTML = 'Right Triangle'
            break;
        case 'acute-obtuse':
            shapeTitle.innerHTML = 'Acute / Obtuse Triangle'
            break;
        default: 
            shapeTitle.innerHTML = shape[0].toUpperCase() + shape.slice(1);
    }
}


function formatValueInput()
{
    // if valid option chosen, all shapes need at least one input box
    if(shape === 'select') return

    valueInput1.style.visibility = 'visible'
    calcButton.style.visibility = 'visible'

    // Correctly prompt for Height / Side / Radius 
    switch(shape)
    {
        case 'rectangle':
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Side'
        case 'square':
            valueInput1.placeholder = 'Enter Side'
            break;
        case 'trapezoid':
            valueInput3.style.visibility = 'visible'
            valueInput3.placeholder = 'Enter Base'
        case 'parallelogram':
        case 'acute-obtuse':
        case 'right':
            valueInput1.placeholder = 'Enter Base'
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Height'
            break;
        case 'cylinder':
        case 'cone':
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Height'
        case 'circle':
        case 'sphere':
            valueInput1.placeholder = 'Enter Radius'
            break;
        default:
            console.log('ERROR - shape not found in function formatValueInput()')
    }
}

// CALCULATE 
function calcArea()
{
    let areaMessage = document.getElementById('areaORerror-display')

    // check values first  
    if(!valueChecking(areaMessage))    //areaTag will ALSO server as the error message
        return
    

    let area = 0
    let volume = 0
    let pi = 3.14
    let side
    let side2
    let base
    let base2
    let height
    let radius

    // corresponding shapes will choose correct var name used to calculcate area
    switch(shape)
    {
        case 'rectangle': 
        case 'square':    
            side = valueInput1.value
            side2 = valueInput2.value   //not used by square
            break;
        case 'trapezoid':
        case 'parallelogram':
        case 'acute-obtuse':
        case 'right':   
            base = valueInput1.value
            height = valueInput2.value
            base2 = valueInput3.value    //certain shapes may not use this
            break;
        case 'cylinder':
        case 'cone':
        case 'circle':
        case 'sphere':
            radius = valueInput1.value
            height = valueInput2.value
            break;
        default:
            console.log('ERROR 1 - shape not found in function calcArea()')
    }

    // calculate area and display
    switch(shape)
    {
        case 'select': return;
        case 'rectangle':     
            area = side * side2
            break;
        case 'square':        
            area = side * side
            console.log('area = ' + area)
            break;
        case 'trapezoid':     
            //conversion to int is needed because without it, (base2+base) will add two strings together, like 1 + 3 = 13
            base2 = parseInt(base2, 10)  //convert to int
            base = parseInt(base, 10)    //convert to int
            area = (base2 + base) * height / 2
            break;
        case 'parallelogram': 
            area = base * height;
            break;
        case 'acute-obtuse':
        case 'right':        
            area = base * height / 2;
            break;
        case 'cylinder':    
            pi_r_h_2 = parseInt(2 * pi * radius * height, 10)
            area = pi_r_h_2 + 2 * pi * Math.pow(radius, 2)
            break;
        case 'cone':    
            // Math.pow/sqrt automatically return ints, but radius needs to be an int in order to properly add values
            radius = parseInt(radius, 10)
            area = pi * radius * (radius + Math.sqrt(Math.pow(height, 2) + Math.pow(radius, 2)))
            break;
        case 'circle':
            area = pi * Math.pow(radius, 2)
            break;
        case 'sphere':
            area = 4 * pi * Math.pow(radius, 2)
            break;
        default:
            console.log('ERROR 2 - shape not found in function calcArea()')
    }

    areaMessage.innerHTML = 'Area: ' + area.toFixed(2) + ' units'
}

function valueChecking(errorMessage)
{
    /*  shapes with corresponding value boxes: 
    square ->        input1       
    circle ->        input1 
    sphere ->        input1     
    rectangle ->     input1   input2
    parallelogram -> input1   input2 
    all triangles -> input1   input2 
    cylinder ->      input1   input2 
    cone ->          input1   input2
    trapezoid ->     input1   input2   input3
    */

    // true until proven false
    let booleanReturn = true

    console.log('value 1 = ' + valueInput1.value)
    console.log('value 2 = ' + valueInput2.value)
    console.log('value 3 = ' + valueInput3.value)


    // ensuring values are not empty
    switch(shape)
    {
        case 'rectangle':
            if(valueInput2.value == '') {
                errorMessage.innerHTML = 'Please Enter Side'
                booleanReturn = false
            }    
        case 'square':
            if(valueInput1.value == '') {
                errorMessage.innerHTML = 'Please Enter Side'
                booleanReturn = false
            }    
            break;
        case 'cylinder':
        case 'cone':
            if(valueInput2.value == '') {
                errorMessage.innerHTML = 'Please Enter Height'
                booleanReturn = false
            }
        case 'circle':
        case 'sphere':
            if(valueInput1.value == '') {
                errorMessage.innerHTML = 'Please Enter Radius'
                booleanReturn = false
            }
            break;
        case 'trapezoid':
            if(valueInput3.value == '') {
                errorMessage.innerHTML = 'Please Enter Second Base'
                booleanReturn = false
            }
        case 'parallelogram':
        case 'right':
        case 'acute-obtuse':
            if(valueInput1.value == '') {
                errorMessage.innerHTML = 'Please Enter Base'
                booleanReturn = false
                break;
            }
            if(valueInput2.value == '') {
                errorMessage.innerHTML = 'Please Enter Height'
                booleanReturn = false
            }
            break;
    }

    //check early return 
    if(!booleanReturn)
        return booleanReturn


    // checking for 0 - 20 values
    if(valueInput1.value < 0 || valueInput1.value > 20)
    {
        booleanReturn = false
        errorMessage.innerHTML = 'Values should be between 0 - 20'
    }

    if(valueInput2.value != '' && (valueInput2.value < 0 || valueInput2.value > 20))
    {
        booleanReturn = false
        errorMessage.innerHTML = 'Values should be between 0 - 20'
    }

    if(valueInput3.value != '' && (valueInput3.value < 0 || valueInput3.value > 20))
    {
        booleanReturn = false
        errorMessage.innerHTML = 'Values should be between 0 - 20'
    }

    return booleanReturn
}