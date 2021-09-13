const variable = 1
let other = 2

if (variable != 3) {
  console.log('pas bon')
} else {
  console.log('Ok')
}

// commentaire

const fruits = [
  {
    name: 'bannane',
    color: 'jaune',
    taille: 12
  },
  {
    name: 'pomme',
    color: 'rouge',
    taille: 5
  },
]

fruits.forEach(fruit => {
  console.log(fruit.name)
})