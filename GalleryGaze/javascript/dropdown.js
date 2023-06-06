const tagsButton = document.querySelector('#tagsButton');
const matterButton = document.querySelector('#matterButton');
const artStyleButton = document.querySelector('#artStyleButton');

const dropdownTags = document.querySelector('#dropdown-1');
const dropdownMatter = document.querySelector('#dropdown-2');
const dropdownStyle = document.querySelector('#dropdown-3');


tagsButton.addEventListener('click', function() {
  dropdownTags.classList.toggle('show');
});

matterButton.addEventListener('click', function() {
  dropdownMatter.classList.toggle('show');
});

artStyleButton.addEventListener('click', function() {
  dropdownStyle.classList.toggle('show');
});