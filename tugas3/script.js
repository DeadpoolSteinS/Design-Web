function getData()
{
    // show result div
    document.getElementById('result').style.display = "block";

    // get input tag
    const input = document.querySelectorAll('li > input, li > textarea, .option input:checked');

    // get place for data
    const output = document.querySelectorAll('.change');

    // change 3 first data (name, born, sex)
    for(let i = 0; i < 3; i++) output[i].innerHTML = input[i].value;

    // change interest (hobi) data
    for(let i = 3; i < input.length-2; i++)
    {
        if(i > 3) output[3].innerHTML += ", ";
        output[3].innerHTML += input[i].value;
    }

    // change 2 last data (religion and message)
    for(let i = 2; i > 0; i--) output[6-i].innerHTML = input[input.length-i].value;
}