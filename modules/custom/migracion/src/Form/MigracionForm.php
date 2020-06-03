<?php
/**
 * @file
 * Contains \Drupal\migracion\Form\MigracionForm.
 */
namespace Drupal\migracion\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MigracionForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'resume_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['pais-annio'] = array(
      '#type'     => 'select',
      '#title'    => t('Selecione País - Año'),
      '#options'    => array(
      'Antigua-y-Barbuda 1991'  => t('Antigua y Barbuda 1991'),
      'Antigua-y-Barbuda 2001'  => t('Antigua y Barbuda 2001'),
      'Argentina-2001'          => t('Argentina 2001'),
      'Argentina-2010'      => t('Argentina 2010'),
      'Barbados-1990'       => t('Barbados 1990'),
      'Barbados-2000'       => t('Barbados 2000'),
      'Belice-1990'       => t('Belice 1990'),
      'Belice-2000'       => t('Belice 2000'),
      'Bolivia-1992'        => t('Bolivia 1992'),
      'Bolivia-2001'        => t('Bolivia 2001'),
      'Bolivia-2012'        => t('Bolivia 2012'),
      'Brasil-1991'       => t('Brasil 1991'),
      'Brasil-2000'       => t('Brasil 2000'),
      'Brasil-2010'         => t('Brasil 2010'),
      'Chile-1982'        => t('Chile 1982'),
      'Chile-1992'        => t('Chile 1992'),
      'Chile-2002'        => t('Chile 2002'),
      'Chile-2017'        => t('Chile 2017'),
      'Colombia-1993'       => t('Colombia 1993'),
      'Colombia-2005'       => t('Colombia 2005'),
      'Costa-Rica-1984'       => t('Costa Rica 1984'),
      'Costa-Rica-2000'       => t('Costa Rica 2000'),
      'Costa-Rica-2011'       => t('Costa Rica 2011'),
      'Cuba-2002'         => t('Cuba 2002'),
      'Cuba-2012'         => t('Cuba 2012'),
      'Ecuador-1982'        => t('Ecuador 1982'),
      'Ecuador-1990'        => t('Ecuador 1990'),
      'Ecuador-2001'        => t('Ecuador 2001'),
      'Ecuador-2010'        => t('Ecuador 2010'),
      'El-Salvador-1992'      => t('El Salvador 1992'),
      'El-Salvador-2007'      => t('El Salvador 2007'),
      'Guatemala-1994'      => t('Guatemala 1994'),
      'Guatemala-2002'      => t('Guatemala 2002'),
      'Honduras-1988'       => t('Honduras 1988'),
      'Honduras-2001'       => t('Honduras 2001'),
      'Honduras-2013'       => t('Honduras 2013'),
      'México-1990'         => t('México 1990'),
      'México-2000'         => t('México 2000'),
      'México-2010'       => t('México 2010'),
      'Nicaragua-1995'      => t('Nicaragua 1995'),
      'Nicaragua-2005'      => t('Nicaragua 2005'),
      'Panamá-1990'         => t('Panamá 1990'),
      'Panamá-2000'         => t('Panamá 2000'),
      'Panamá-2010'         => t('Panamá 2010'),
      'Paraguay-1982'       => t('Paraguay 1982'),
      'Paraguay-1992'       => t('Paraguay 1992'),
      'Paraguay-2002'       => t('Paraguay 2002'),
      'Perú-1993'         => t('Perú 1993'),
      'Perú-2007'         => t('Perú 2007'),
      'República-Dominicana-2002' => t('República Dominicana 2002'),
      'República-Dominicana-2010' => t('República Dominicana 2010'),
      'Santa-Lucía-1991'      => t('Santa Lucía 1991'),
      'Santa-Lucía-2001'      => t('Santa Lucía 2001'),
      'Uruguay-1985'        => t('Uruguay 1985'),
      'Uruguay-1996'        => t('Uruguay 1996'),
      'Uruguay-2011'        => t('Uruguay 2011'),
      'Venezuela-1990'      => t('Venezuela 1990'),
      'Venezuela-2001'      => t('Venezuela 2001'),
      'Venezuela-2011'      => t('Venezuela 2011')
      ),
        '#required' => TRUE,
    );


    $form['administracion-administrativa'] = array (
      '#type'     => 'radios',
      '#title'    => t('Seleccione administracion administrativa'),
      '#options'    => array(
          'DAM'   => t('División Administrativa Mayor - DAM'),
          'DAME'    => t('División Administrativa Menor - DAME')
        ),
      '#required'   => TRUE,
    );


  $form['poblacion-total'] = array (
      '#type'     => 'radios',
      '#title'    => t('Seleccione población'),
      '#options'    => array(
          'pob-total' => t('Población total'),
          'pob-annios'=> t('Población 5 años o más')
      ),
      '#required' => TRUE,
    );


    $form['sexo-poblacion'] = array(
      '#type'     => 'checkboxes',
      '#title'    => t('Indicar sexo'),
      '#options'    => array(
        'hombre'  => t('Hombre'),
        'mujer'   => t('Mujer')
      ),
      '#required'   => TRUE,
    );


    $form['edad'] = array (
      '#type'     => 'select',
      '#title'    => 'Indicar rango etario',
      '#multiple'    => TRUE,
      '#options'    => array (
        'rango-1'   => '0 a 10 años',
        'rango-2'   => '11 a 20 años',
        'rango-3'   => '21 a 30 años',
        'rango-4'   => '31 a 40 años',
        'rango-5'   => '41 a 50 años',
        'rango-6'   => '51 a 60 años',
        'rango-7'   => '61 a 70 años',
        'rango-8'   => '71 a 80 años',
        'rango-9'   => '81 a 90 años',
        'rango-10'  => 'más de 90 años',
      ),
      '#required'   => TRUE,
    );


    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Ejecutar'),
      '#button_type' => 'primary',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
    public function validateForm(array &$form, FormStateInterface $form_state) {

   //   if (strlen($form_state->getValue('edad')) != 1) {
   //     $form_state->setErrorByName('edad', $this->t('Un error ha ocurrido'));
   //   }

    }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('pais-annio'))));

 //   foreach ($form_state->getValues() as $key => $value) {
   //   drupal_set_message($key . ': ' . $value);
    }

}