function buildConfig(env) {

    let types = env.split('.');
    let preset = `./webpack/${types[0]}/${types[1]}.babel.js`;
    return require(preset).default(env);
}

module.exports = buildConfig;