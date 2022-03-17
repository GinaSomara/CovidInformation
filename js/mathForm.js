// Value Input ~ Height / Side / Base / Radius 
var valueInput1;
var valueInput2;
var valueInput3;

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

    // 1) Clear Form
    reset()
    
    // 2) Grab Selected Shape
    const select = document.getElementById('shape-selector')
    const value = select.options[select.selectedIndex].value

    // 3) Display shape + area
    valuePrompt(value)

    // 4) Reset Drop Down
    document.getElementById('shape-selector').selectedIndex = 0
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

    // Prompt user for shape values
    formatValueInput(value)
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
    }
}


/* SIDES:

Square:          (1)    side 
Rectangle:       (2)    side     side

Parallelogram:   (2)    base     height
Acute/Obtuse:    (2)    base     height 
Right:           (2)    base     height
Trapeziod:       (3)    base     height    height
Circle           (1)    radius
Sphere:          (1)    radius
Cylinder:        (2)    radius   height 
Cone:            (2)    radius   hright
*/
