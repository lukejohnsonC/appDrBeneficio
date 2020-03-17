.ed-plus {
	width: 70px;
	margin: 0 auto;
	float: none;
}
.ed-editable-delete {
	width: 145px;
	float: right;
}
.ed-complete {
	width: 220px;
	margin: 2rem auto;
}
	.ed-complete button i {
		font-size: 30px;
		color: {{$primary}};
	}
	.ed-plus button,
	.ed-editable-delete button,
	.ed-complete button {
		width: 70px;
		background: none;
		border: none;
		cursor: pointer;
	}

.ed-plus i:not(first-child),
.ed-editable-delete i:not(first-child),
.ed-complete i:not(first-child) {
	color: {{$secondary}};
}
