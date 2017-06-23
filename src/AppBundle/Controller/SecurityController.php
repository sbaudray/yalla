<?php

namespace AppBundle\Controller;

use AppBundle\Form\LoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticalUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticalUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticalUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            'username' => $lastUsername
        ]);

        return $this->render(
            'security/login.html.twig',
            array(
                'form' => $form->createView(),
                'error' => $error,
            )
        );
    }
}
