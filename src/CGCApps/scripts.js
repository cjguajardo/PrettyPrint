function toggleCollapse(element) {
  const targetBlockId = element.getAttribute('target-block');
  const targetBlock = document.getElementById(targetBlockId);
  if (targetBlock) {
    targetBlock.classList.toggle('collapsed');
    element.classList.toggle('children-collapsed');
  }
}

function addListeners() {
  const toggleChildrenButtons =
    document.getElementsByClassName('parent-block start');
  for (let i = 0; i < toggleChildrenButtons.length; i++) {
    const button = toggleChildrenButtons[i];
    button.addEventListener('click', () => toggleCollapse(button));
  }
}

if (document.readyState !== 'loading') {
  addListeners();
} else {
  document.addEventListener('DOMContentLoaded', function () {
    addListeners();
  });
}
