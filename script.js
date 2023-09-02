const afterSubmit = () => {
  setTimeout(() => {
    const elements = document.getElementsByClassName('afterSubmit');
    for (i = 0; i < elements.length; i++) elements[i].value = '';
    location.reload();
  }, 1000);
};
