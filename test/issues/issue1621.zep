namespace Test\Issues;

class Issue1621
{
	/**
	 * Local variable values overwrite global variables
	 * when require statement is used (the required file can be empty).
	 */
	public function render(string! templatePath, var params)
	{
		var key, value;

		if typeof params == "array" {
			for key, value in params {
				let {key} = value;
			}
		}

		require templatePath;
	}
}
