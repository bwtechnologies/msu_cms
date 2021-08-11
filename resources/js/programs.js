//Look at the list of Programs, and add classes to any Map components
export const checkPrograms = (country) => {
  return country.programs.length > 0 ? ' programs' : ''
}

//Find an existing Program and put new input into it
export const updateProgram = (program, target) => {
  return target.programs.map(p => {
    if(p.id !== program.id){
      return p
    }else{
      return program
    }
  })
}

//Push a new program into the 'reset' variable and the state of a Component
export const injectProgram = (program, target) => {
  let state = target.state
  let programs = state.programs
  programs.push(program)
  target.setState({programs: programs})
  target.programs = programs
}

//Take a program submitted through a Modal form, process the inputs, then return the processed entity
export const parseProgram = (program) => {
  if(program.id) program.id = parseFloat(program.id)
  program.countries = typeof program.country_ids != 'string' ? 
                      JSON.stringify(program.country_ids) : 
                      program.country_ids
  delete program.country_ids
  return program
}