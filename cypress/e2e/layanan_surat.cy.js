describe('Layanan Surat', () => {
    it('User can open layanan surat', () => {
        cy.visit('localhost:8000/')

        cy.get('.dropdown > .nav-link > .nav-link-inner--text').click()
        cy.get('[href="http://localhost:8000/layanan-surat"] > .nav-link-inner--text').click()
    })
  }
)
