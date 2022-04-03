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
    area_errorTag.innerHTML = ''

    let perimeterTag = document.getElementById('perimeterORvolume-display')
    perimeterTag.innerHTML = ''

    let displayedShape = document.getElementById('display-shapes')
    displayedShape.style.height = '0px'
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
            valueInput1.placeholder = 'Enter Base'
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Height'
            break;
        case 'parallelogram':
            valueInput3.style.visibility = 'visible'
            valueInput3.placeholder = 'Enter Side'
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
    let perimeterMessage = document.getElementById('perimeterORvolume-display')

    // check values first, if true, user will need to re-attempt data entry 
    if(!valueChecking(areaMessage))    //areaTag will ALSO server as the error message
    {
        perimeterMessage.innerHTML = ''
        return
    }
    let area = 0
    let perimeter = 0
    let volume = 0 
    let pi = 3.14
    let side
    let side2
    let base
    let base2
    let height
    let radius
    let hypotenuse

    // corresponding shapes will choose correct var name used to calculcate area
    switch(shape)
    {
        case 'rectangle': 
        case 'square':    
            side = valueInput1.value
            side2 = valueInput2.value   //not used by square
            break;
        case 'parallelogram':
            side = valueInput3.value
        case 'trapezoid':
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

    // calculate area/perimeter/volume and display
    switch(shape)
    {
        case 'select': return;
        case 'rectangle':     
            area = side * side2
            perimeter = (side * 2) + (side2 * 2)
            break;
        case 'square':        
            area = side * side
            perimeter = side * 4
            break;
        case 'trapezoid':     
            //conversion to int is needed because without it, (base2+base) will add two strings together, like 1 + 3 = 13
            base2 = parseInt(base2, 10)  //convert to int
            base = parseInt(base, 10)    //convert to int
            area = (base2 + base) * height / 2

            /* need to find both sides (from height) for trapezoid perimeter
            *     __     <- like so
            *    /__\  turns into two right triangles + square
            * NOTE: trapezoids are assumed with have EVEN sides */
            let trianglebases = Math.abs(base - base2) / 2
            let sides = Math.sqrt(Math.pow(height, 2) + Math.pow(trianglebases,2)) //one side
            sides = sides * 2

            perimeter = base + base2 + sides 
            break;
        case 'parallelogram': 
            area = base * height;
            base = parseInt(base, 10)
            height = parseInt(height, 10)
            perimeter = 2 * (base + height)
            break;
        case 'acute-obtuse':
            area = base * height / 2;

            // equally dividing base 
            base = base / 2
            hypotenuse = Math.sqrt(Math.pow(base, 2) + Math.sqrt(height, 2))
            console.log('hypot for acute/obtuse= ' + hypotenuse)
            // for one side triangle, so need to multiple by 2
            perimeter = (hypotenuse + base + height) * 2
            break;
        case 'right':        
            area = base * height / 2;

            base = parseInt(base, 10)
            height = parseInt(height, 10)
            hypotenuse = Math.sqrt(Math.pow(base, 2) + Math.pow(height, 2))
            console.log('hypot for acute/obtuse= ' + hypotenuse)

            perimeter = hypotenuse + base + height
            break;
        case 'cylinder':    
            pi_r_h_2 = parseInt(2 * pi * radius * height, 10)
            area = pi_r_h_2 + 2 * pi * Math.pow(radius, 2)
            volume = pi * Math.pow(radius, 2) * height
            break;
        case 'cone':    
            // Math.pow/sqrt automatically return ints, but radius needs to be an int in order to properly add values
            radius = parseInt(radius, 10)
            area = pi * radius * (radius + Math.sqrt(Math.pow(height, 2) + Math.pow(radius, 2)))
            volume = pi * Math.pow(radius, 2) * height / 3;
            console.log(volume)
            break;
        case 'circle':
            area = pi * Math.pow(radius, 2)
            perimeter = 2 * pi * radius
            break;
        case 'sphere':
            area = 4 * pi * Math.pow(radius, 2)
            volume = 4 / 3 * pi * Math.pow(radius, 3)
            break;
        default:
            console.log('ERROR 2 - shape not found in function calcArea()')
    }

    // Display area for all shapes
    areaMessage.innerHTML = 'Area: ' + area.toFixed(2) + ' units' 

    // 3D shapes display Volume     - all others display perimeter
    if(shape == 'cone' || shape == 'sphere' || shape == 'cylinder')
        perimeterMessage.innerHTML = 'Volume: ' + volume.toFixed(2) + ' units'
    else if (shape == 'trapezoid' || shape == 'acute-obtuse' || shape == 'right')
        perimeterMessage.innerHTML = 'Perimeter: ' + perimeter.toFixed(0) + ' units  (w/ even sides)'     
    else // 2D shapes
        perimeterMessage.innerHTML = 'Perimeter: ' + perimeter.toFixed(0) + ' units'  

    displayShape()
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
        case 'parallelogram':
            if(valueInput3.value == '') {
                errorMessage.innerHTML = 'Please Enter Side'
                booleanReturn = false
                break;
            }      
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

    //check early return, will prompt error messages
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

    /*
     Come back To:
        weird input that is accepted:
            1) 7- and 7-- is read as ' '
            2) 7+ is read as ' '  
                * 7 could be any number between 0 - 20
    */
}

function displayShape()
{
    let displayedShape = document.getElementById('display-shapes')

    //scale every input X4

    // switch(shape)
    // {
    //     case 'triangle':
    //         displayShape.style.height = 

    // }
}