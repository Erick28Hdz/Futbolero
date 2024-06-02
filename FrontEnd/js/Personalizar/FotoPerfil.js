document.getElementById('changeImageButton').addEventListener('click', function() {
    document.getElementById('profilePictureInput').click();
  });

  document.getElementById('profilePictureInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        const imageUrl = event.target.result;
        document.getElementById('profileImage').src = imageUrl;
      };
      reader.readAsDataURL(file);
    }
  });