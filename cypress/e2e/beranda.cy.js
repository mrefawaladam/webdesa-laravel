describe('Beranda Page', () => {
  it('User can open beranda', () => {
    cy.visit('http://localhost:8000/')
    cy.get('span').contains('Beranda').click()

    cy.url().should('contain','http://localhost:8000/')
  })

  it('User can open beranda when click Desa', () => {
    cy.visit('http://localhost:8000/')
    cy.get('a').contains('Desa').click()

    cy.url().should('contain','http://localhost:8000/')
  })
})
