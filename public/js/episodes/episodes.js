function checkUncheckAllEpisodes(button) {

	let inputCheck = document.querySelector('#allChecked');
	let isAllChecked = inputCheck.value === "true";

	let episodesCheckbox = document.querySelectorAll('.checkbox');
	episodesCheckbox.forEach(episodeCheckbox => {
		episodeCheckbox.checked = !isAllChecked;
	});

	if(isAllChecked) {
		button.textContent = "Check all";
		inputCheck.value = "false";
		return;
	}

	button.textContent = "Uncheck all";
	inputCheck.value = "true";
	return;
}
