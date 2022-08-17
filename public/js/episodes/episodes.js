
window.onload = () => {
	let episodesCheckbox = document.querySelectorAll('.checkbox');
	let isAllChecked = true;

	episodesCheckbox.forEach(episodeCheckbox => {
		if(episodeCheckbox.checked == false){
			isAllChecked = false;
		}
	});

	changeButtonCheckboxText(isAllChecked);
}

function checkUncheckAllEpisodes() {

	let inputIsAllChecked = document.querySelector('#allChecked');
	let isAllChecked = inputIsAllChecked.value === "true";

	let episodesCheckbox = document.querySelectorAll('.checkbox');
	episodesCheckbox.forEach(episodeCheckbox => {
		episodeCheckbox.checked = !isAllChecked;
	});

	changeButtonCheckboxText(!isAllChecked);

}


function changeButtonCheckboxText(isAllChecked) {

	let button = document.querySelector('#checkButton');
	let inputIsAllChecked = document.querySelector('#allChecked');

	if(isAllChecked) {
		button.textContent = "Uncheck all";
		inputIsAllChecked.value = "true";
		return;
	}

	button.textContent = "Check all";
	inputIsAllChecked.value = "false";
	return;

}
