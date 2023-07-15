//references-https://www.w3schools.com/js/tryit.asp?filename=tryai_chartjs_lines_multi

const xValues = [1,2,3,4]; //x-axis values - time(weeks)
const yValues = [10,20,30,40,50,60,70,80,90,100]; //y-axis values - progress of the project

new Chart("progressChart", 
{
    type: "line", //line chart
    data: 
    {
        labels: xValues, //x-axis labels
        datasets: [ { 
            label: 'Project 1', //Progress of the Project 1
            data: [13,42,78,100], //y-axis values
            borderColor: "#073e41",
            fill: false //no fill
        }]
    },
        options: //options for the chart
        {
            legend: {display: false} //no legend
        }
}
);
