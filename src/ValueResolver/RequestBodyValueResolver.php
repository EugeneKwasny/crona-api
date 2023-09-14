<?php

namespace App\ValueResolver;

use App\Attribute\RequestBody;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestBodyValueResolver implements ValueResolverInterface
{
    public function __construct(
        private readonly SerializerInterface $serializer, 
        private readonly ValidatorInterface $validator
        )
    {
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        if (!$argument->getAttributesOfType(RequestBody::class, ArgumentMetadata::IS_INSTANCEOF)) {
            return [];
        }
      
        try {
            $model = $this->serializer->deserialize(
                $request->getContent(),
                $argument->getType(),
                JsonEncoder::FORMAT
            );
        } catch (\Throwable $throwable) {
            throw new Exception($throwable);
        }

        $errors = $this->validator->validate($model);
        if (count($errors) > 0) {
            throw new Exception($errors);
        }

        return [$model];
    }
}
