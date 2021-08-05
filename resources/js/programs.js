import {randomID} from './functions'

//Look at the list of Programs, and add classes to any Map components
export const checkPrograms = (country) => {
  return country.programs.length > 0 ? ' programs' : ''
}

export const updateProgram = (program, target) => {
  return target.programs.map(p => {
    if(p.id !== program.id){
      return p
    }else{
      return program
    }
  })
}

export const injectProgram = (obj, target) => {
  let nu = target.state.programs
  nu.push(obj)
//  console.log(nu)
  target.setState({programs: nu})
  target.programs = nu
}

export const parseProgram = (program) => {
  if(program.id) program.id = parseFloat(program.id)
  program.countries = typeof program.country_ids != 'string' ? 
                      JSON.stringify(program.country_ids) : 
                      program.country_ids
  delete program.country_ids
  return program
}