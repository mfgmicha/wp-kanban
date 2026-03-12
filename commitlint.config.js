module.exports = {
	extends: ['@commitlint/config-conventional'],
	rules: {
		'type-case': [2, 'always', 'start-case'],
		'type-enum': [2, 'always', ['Build', 'Chore', 'Ci', 'Docs', 'Feat', 'Fix', 'Perf', 'Refactor', 'Revert', 'Style', 'Test']],
	}
};
