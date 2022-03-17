// Value Input ~ Height / Side / Base / Radius 
var valueInput1;
var valueInput2;
var valueInput3;
var calcButton;

function reset()
{
    valueInput1.style.visibility = 'hidden';
    valueInput2.style.visibility = 'hidden';
    valueInput3.style.visibility = 'hidden';
}


// START
function clicked() 
{
    valueInput1 = document.getElementById('input-1');
    valueInput2 = document.getElementById('input-2');
    valueInput3 = document.getElementById('input-3');
    calcButton = document.getElementById('calculate-button')

    // 1) Clear Form
    reset()
    
    // 2) Grab Selected Shape
    const select = document.getElementById('shape-selector')
    const value = select.options[select.selectedIndex].value

    // 3) Display shape + area
    valuePrompt(value)

    // 4) Prompt for shape values
    formatValueInput(value)

    // Last 2 STEPS - called by 'Calculate' button on HTML

    // 5) Calculate Area os Shape
    // calcArea(value)
    // 6) Reset Drop Down
    // document.getElementById('shape-selector').selectedIndex = 0
}

// Get Values for Correct Shape
function valuePrompt(value)
{
    let shapeTitle = document.getElementById('shape-title');

    // Display chosen shape name & Value prompt 
    switch(value)
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
            shapeTitle.innerHTML = value[0].toUpperCase() + value.slice(1);
    }
}


function formatValueInput(shape)
{
    //clear input box format
    reset()

    // if valid option chosen, all shapes need at least one input box
    if(shape === 'switch') return
    else valueInput1.style.visibility = 'visible'

    console.log('made it into general function')

    // Correctly prompt for Height / Side / Radius 
    switch(shape)
    {
        case 'rectangle':
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Side'
        case 'square':
            valueInput1.placeholder = 'Enter Side'
            break
        case 'trapezoid':
            valueInput3.style.visibility = 'visible'
            valueInput3.placeholder = 'Enter Base'
        case 'parallelogram':
        case 'acute-obtuse':
        case 'right':
            console.log('made it into  switch')
            valueInput1.placeholder = 'Enter Base'
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Height'
            break
        case 'cylinder':
        case 'cone':
            valueInput2.style.visibility = 'visible'
            valueInput2.placeholder = 'Enter Height'
        case 'circle':
        case 'sphere':
            valueInput1.placeholder = 'Enter Radius'
            break
        default:
            console.log('ERROR - shape not found in function formatValueInput()')
    }
}

function calcArea(shape)
{
    let area = 0;

    let side;
    let side2;
    let base;
    let base2;
    let height;
    let radius;

    // corresponding shapes will choose correct var name to calculate
    switch(shape)
    {
        case 'rectangle': 
        case 'square':    
            side = valueInput1.value
            side2 = valueInput2.value 
            console.log(side + ' ' + side2)
            break
        case 'trapezoid':
        case 'parallelogram':
        case 'acute-obtuse':
        case 'right':   
            base = valueInput1.value
            height = valueInput2.value
            base2 = valueInput3.value
            break
        case 'cylinder':
        case 'cone':
        case 'circle':
        case 'sphere':
            radius = valueInput1.value
            height = valueInput2.value
            break
        default:
            console.log('ERROR - shape not found in function calcArea()')
    }

    switch(shape)
    {
        case 'select': return area;
        case 'rectangle': return side * side
        case 'square': return side
        case 'trapezoid':
        case 'parallelogram':
        case 'acute-obtuse':
        case 'right':
        case 'cylinder':
        case 'cone':
        case 'circle':
        case 'sphere':
        default:
            console.log('ERROR - shape not found in function calcArea()')
    }

}


/* SIDES:

Square:          (1)    side 
Rectangle:       (2)    side     side

Parallelogram:   (2)    base     height
Acute/Obtuse:    (2)    base     height 
Right:           (2)    base     height
Trapeziod:       (3)    base     height    base
Circle           (1)    radius
Sphere:          (1)    radius
Cylinder:        (2)    radius   height 
Cone:            (2)    radius   hright
*/
